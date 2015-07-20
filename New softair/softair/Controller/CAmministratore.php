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
				
				if($giorni>7){
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
		$view->setLayout('amministratore_partite');
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
		$view->setLayout('amministratore_partite_modifica');
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
		$view->setLayout('amministratore_conferma_partita_mod');
		return $view->processaTemplate();
	}
	
	public function eliminaPartita(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$idpartita=$view->getIdPartita();
		if($idpartita==FALSE){
			$idpartita=$session->leggi_valore('idpartita');}
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
		$view->setLayout('amministratore_conferma_partita_el');
		return $view->processaTemplate();
	}
	
	
	public function vediAnnunci(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$FAnnuncio=new FAnnuncio();
		$annuncio=$FAnnuncio->loadall();
		if ($annuncio!=false) {
			$date=USingleton::getInstance('UData');
			for($i=0; $i<count($annuncio); $i++) {
				$giorni=$date->diff_daoggi($annuncio[$i]->getData());
				$temp=get_object_vars($annuncio[$i]);
				$data2=$temp['data'];
				$giorni=$date->diff_daoggi($data2);
				if($giorni<=31){
					$this->_array_dati_annunci[]=$temp;
					$scadenza[]=$date->sommaMese($annuncio[$i]->getData(),31);
					$start = DateTime::createFromFormat('Y-m-d',$this->_array_dati_annunci[$i]['data']);
					$this->_array_dati_annunci[$i]['data']=$start->format('d/m/Y');
					$view->impostaDati('scadenza',$scadenza);
				}
				else{
					$FAnnuncio->delete($item);
				}
			}
			$view->impostaDati('datiAnnunci', $this->_array_dati_annunci);
		}
		$session->imposta_valore('annunciamministratore','am');
		$view->setLayout('amministratore_annunci');
		return $view->processaTemplate();
		
	}
	
	public function vediPrenotazioni(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$FPrenotazione=new FPrenotazione();
		$prenotazione=$FPrenotazione->loadall();
		if ($prenotazione!=false) {
			$i=0;
			while ($i<count($prenotazione)) {
				$this->_array_dati_partite[$i]=get_object_vars($prenotazione[$i]);
				$i++;
			}
			$view->impostaDati('datiPartite', $this->_array_dati_partite);
		}
		$session->imposta_valore('prenotazioniamministratore','pm');
		$view->setLayout('amministratore_prenotazioni');
		return $view->processaTemplate();
		
	}
	
	
	public function vediProfili(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		
        $FUtente = new FUtente();
        $utenti= $FUtente->loadall();
		if ($utenti!=false) {
			for($i=0; $i<count($utenti); $i++){
				$dati_utente[$i]=get_object_vars($utenti[$i]);
			}
			$view->impostaDati('datiUtente', $dati_utente);
		}
		$session->imposta_valore('profiliamministratore','pa');
		$view->setLayout('amministratore_profili');
		return $view->processaTemplate();
	}
	
	
	public function eliminaProfilo(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$username=$view->getUtente();
				
		//elimina tutte le preenotazioni fatte dall'utente aggiornando i posti
		//liberi nelle partite a cui era prenotato
		$FPrenotazione=new FPrenotazione();
		$prenotazioni=$FPrenotazione->loadfromuser($username);
		$FPartita = new FPartita();
		for ($i=0; $i<count($prenotazioni) && $prenotazioni!=''; $i++) {
			$PartitaID=$prenotazioni[$i]->getPartitaID();
			$FPrenotazione->delete($prenotazioni[$i]);
			$partita=$FPartita->load($PartitaID);
			$ndisponibili=$partita->getNdisponibili();
			$partita->setNdisponibili($ndisponibili+1);
			$FPartita->update($partita);
		}
		
		//elimina tutte le partite create dell'utente con tutte le relative prenotazioni associate
		$partite=$FPartita->loadfromcreatore($username);
		for($i=0; $i<count($partite) && $partite!=''; $i++){
			$array_partite[$i]=get_object_vars($partite[$i]);
			$session->imposta_valore('idpartita', $array_partite[$i]['IDpartita']);
			$this->eliminaPartita();
		}
		
		//elimina tutti gli annunci pubblicati
		$FAnnuncio=new FAnnuncio();
		$annunci=$FAnnuncio->loadfromuser($username);
		if($annunci!='')
			$FAnnuncio->deleterel($annunci);
		
		//elimina il profilo dell'utente
		$FUtente = new FUtente();
		$utente= $FUtente->load($username);
		$FUtente->delete($utente);
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
			case 'vediprenotazioni':
					return $this->vediPrenotazioni();
			case 'vediprofili':
					return $this->vediProfili();
			case 'eliminaprofilo':
					return $this->eliminaProfilo();
		
		
		}
	}
	
}
?>