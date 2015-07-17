<?php
/**
 * 
 * @package Control
 * @access public
 */
class CAmministratore {
	
	
	public function vediPartite(){
		$view = USingleton::getInstance('VAmministratore');
		$FPartita=new FPartita();
		$partite=$FPartita->loadall();
		if ($partite!=false) {
			for($i=0; $i<count($partite); $i++) {
				
				$date=USingleton::getInstance('UData');
				$dataPartita=$partite[$i]->getData();
				$giorni=$date->diff_daoggi($dataPartita);
				
				if($giorni>-7){
					$FPrenotazione=new FPrenotazione();
					$prenoRelative=$FPrenotazione->loadfrompartita($partite[$i]->getId());
					if ($prenoRelative!='')
						$FPrenotazione->deleteRel($prenoRelative);
					$FCommento=new FCommento();
					$commRelative=$FCommento->loadCommenti($partite[$i]->getId());
					if ($commRelative!='')
						$FCommento->deleteRel($commRelative);
					
					$FPartita->delete($partite[$i]);
				}
				else{
				$array_partite[$i]=get_object_vars($partite[$i]);
				$start = DateTime::createFromFormat('Y-m-d',$array_partite[$i]['data']);
				$array_partite[$i]['data']=$start->format('d/m/Y');
				}
			}
			$view->impostaDati('datiPartite', $array_partite);
		}
		$view->setLayout('partite');
		return $view->processaTemplate();
	}

	public function modPartita(){
		$view = USingleton::getInstance('VAmministratore');
		$idpartita=$view->getIdPartita();
		$session=USingleton::getInstance('USession');
		$session->imposta_valore('idpartita',$idpartita);
		$FPartita=new FPartita();
		$partita=$FPartita->load($idpartita);
		$dati_partita=get_object_vars($partita);
		$view->impostaDati('datiPartita', $dati_partita);
		$nprenotati=$dati_partita['ngiocatori']-$dati_partita['ndisponibili'];
		$view->impostaDati('nprenotati', $nprenotati);
		$view->setLayout('partite_modifica');
		return $view->processaTemplate();	
	}
	
	public function salvaPartita(){
		$view=USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		
		$EPartita=new EPartita();
		$FPartita=new FPartita();
		$dati_registrazione=$view->getDatiCreaPartita();
		$data=$dati_registrazione['Anno'].'-'.$dati_registrazione['Mese'].'-'.$dati_registrazione['Giorno'];
		$username=$session->leggi_valore('username');
		$EPartita->autore=$username;
		$EPartita->titolo=($dati_registrazione['Titolo']);
		$EPartita->indirizzo=($dati_registrazione['Indirizzo']);
		$EPartita->data=$data;
		$EPartita->descrizione=($dati_registrazione['Descrizione']);
		$EPartita->ngiocatori=($dati_registrazione['Giocatori']);
		$EPartita->ndisponibili=($dati_registrazione['Giocatori']);
		$EPartita->categoria=($dati_registrazione['Categoria']);
		$EPartita->attrezzatura=($dati_registrazione['Attrezzatura']);
		$EPartita->setPrezzo($dati_registrazione['Prezzo']);
		$idpartita=$session->leggi_valore('idpartita');
		$EPartita->IDpartita=$idpartita;
		$file=$view->getFile();
		if($file){
			$nomeOriginale=basename($view->getOriginalFile());
			$dir="./immagini/partite/".$session->leggi_valore('username').'/';
			$target=$dir.'partite'.'_'.$nomeOriginale;
			if(!is_dir($dir)){
				mkdir($dir,0755,true);
			}
			if(move_uploaded_file($file, $target)){
				$EPartita->immagine=$target;
		
			}
		}
		$FPartita->update($EPartita);
		$view->setLayout('conferma_partita_mod');
		return $view->processaTemplate();
	}
	
	public function eliminaPartita(){
		$view = USingleton::getInstance('VAmministratore');
		$idpartita=$view->getIdPartita();
		$FPrenotazione=new FPrenotazione();
		$prenoRelative=$FPrenotazione->loadfrompartita($idpartita);
		if ($prenoRelative!='')
			$FPrenotazione->deleteRel($prenoRelative);
		$FCommento=new FCommento();
		$commRelative=$FCommento->loadCommenti($idpartita);
		if ($commRelative!='')
			$FCommento->deleteRel($commRelative);
		$FPartita=new FPartita();
		$partita=$FPartita->load($idpartita);
		$FPartita->delete($partita);
		$view->setLayout('conferma_partita_el');
		return $view->processaTemplate();
	}
	
	
	public function vediAnnunci(){
		
	}
	
	
	public function smista() {
		$view=USingleton::getInstance('VAmministratore');
		switch ($view->getTask()){
			case 'vedipartite':
				return $this->vediPartite();
			case 'modpartita':
				return $this->modPartita();
			case 'salvapartita':
				return $this->salvaPartita();
			case 'eliminapartita':
				return $this->eliminaPartita();
			case 'vediannunci':
				return $this->vediAnnunci();	
		}
	}
	
}
?>