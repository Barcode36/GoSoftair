<?php
/**
 * Descrizione di CAmministratore
 * La classe da all'amministatore la capacità di visualizzare, modificare e eliminare
 * le partite, gli annunci, le prenotazioni e gli utenti 
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CAmministratore {
	
	/**
	 * La funzione imposta la pagina che permette all'amministratore di gestire tutte le partite
	 * presenti sul database non più vecchie di 7 giorni mostrandole in tabelle.
	 * @access public
	 * @return mixed
	 */
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
				$array_partite[$i]=$partite[$i]->getAllArray();
				$start = DateTime::createFromFormat('Y-m-d',$array_partite[$i]['data']);
				$array_partite[$i]['data']=$start->format('d/m/Y');
				}
			}
			$view->impostaDati('datiPartite', $array_partite);
		}
		$view->setLayout('amministratore_partite');
		return $view->processaTemplate();
	}

	/**
	 * La funzione viene richiamata dalla pagine delle partite quando l'amministaratore decide 
	 * di modificare una partita preparando una forma analoga a quella di creazione della 
	 * partita precompilata con i dati attuali. 
	 * @access public
	 * @return mixed
	 */
	public function modPartita(){
		$view = USingleton::getInstance('VAmministratore');
		$idpartita=$view->getIdPartita();
		$session=USingleton::getInstance('USession');
		$session->imposta_valore('idpartita',$idpartita);
		$FPartita=new FPartita();
		$partita=$FPartita->load($idpartita);
		$dati_partita=$partita->getAllArray();
		$session->imposta_valore('autore',$dati_partita['autore']);
		
		$temp=$dati_partita['data'];
		$start = DateTime::createFromFormat('Y-m-d', $temp);
		$data=$start->format('d/m/Y');
		$view->impostaDati('data', $data);
		
		list($ora,$minuti) = explode('.',$dati_partita['ora']);
		$orario=array('ora'=>$ora,'minuti'=>$minuti);
		$view->impostaDati('ora', $orario);
		
		$view->impostaDati('datiPartita', $dati_partita);
		$nprenotati=$dati_partita['ngiocatori']-$dati_partita['ndisponibili'];
		$view->impostaDati('nprenotati', $nprenotati);
		$view->setLayout('amministratore_partite_modifica');
		return $view->processaTemplate();
	}
	
	/**
	 * La funzione viene richiamata quando l'amministratatore conferma di aver finito 
	 * di modificare la partita. La funzione semplicemente aggiorna la partita sul DB.
	 * @access public
	 * @return mixed
	 */
	public function salvaPartita(){
		$view=USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		
		$EPartita=new EPartita();
		$FPartita=new FPartita();
		$dati_registrazione=$view->getDatiCreaPartita();
		
		$temp=$dati_registrazione['Data'];
		$start = DateTime::createFromFormat('d/m/Y', $temp);
		$data=$start->format('Y-m-d');
		
		$ora=$dati_registrazione['Ora'].'.'.$dati_registrazione['Minuti'];
		
		$autore=$session->leggi_valore('autore');
		
		$EPartita->setAutore($autore);
		$EPartita->setTitolo($dati_registrazione['Titolo']);
		$EPartita->setIndirizzo($dati_registrazione['Indirizzo']);
		$EPartita->setData($data);
		$EPartita->setOra($ora);
		$EPartita->setDescrizione($dati_registrazione['Descrizione']);
		$EPartita->setNgiocatori($dati_registrazione['Giocatori']);
		$EPartita->setNdisponibili($dati_registrazione['Giocatori']);
		$EPartita->setCategoria($dati_registrazione['Categoria']);
		$EPartita->setAttrezzatura($dati_registrazione['Attrezzatura']);
		$EPartita->setPrezzo($dati_registrazione['Prezzo']);
		
		$idpartita=$session->leggi_valore('idpartita');
		$EPartita->setIDpartita($idpartita);
		
		$file=$view->getFile();
		if($file){
			$nomeOriginale=basename($view->getOriginalFile());
			$dir="./immagini/partite/".$session->leggi_valore('username').'/';
			$target=$dir.'partite'.'_'.$nomeOriginale;
			if(!is_dir($dir)){
				mkdir($dir,0755,true);
			}
			if(move_uploaded_file($file, $target)){
				$EPartita->setImmagine($target);
		
			}
		}
		
		$FPartita->update($EPartita);
		$view->setLayout('amministratore_conferma_partita_mod');
		return $view->processaTemplate();
	}
	
	/**
	 * La funzione viene richiamata della pagine delle partite dall'amministratore quando decide 
	 * di eliminare una partita. Vengono automaticamente elimitati anche i commenti associati
	 * alla partite e le prenotazioni relative.
	 * @access public
	 * @return mixed
	 */
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
	
	/**
	 * La funzione imposta la pagina che permette all'amministratore di gestire tutti gli annunci
	 * presenti sul database non scaduti. 
	 * @access public
	 * @return mixed
	 */
	public function vediAnnunci(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$FAnnuncio=new FAnnuncio();
		$annuncio=$FAnnuncio->loadall();
		if ($annuncio!=false) {
			$date=USingleton::getInstance('UData');
			for($i=0; $i<count($annuncio); $i++) {
				$giorni=$date->diff_daoggi($annuncio[$i]->getData());
				$temp=$annuncio[$i]->getAllArray();
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
					$FAnnuncio->delete($annuncio[$i]);
				}
			}
			$view->impostaDati('datiAnnunci', $this->_array_dati_annunci);
		}
		$session->imposta_valore('annunciamministratore','am');
		$view->setLayout('amministratore_annunci');
		return $view->processaTemplate();
		
	}
	
	/**
	 * La funzione imposta la pagina che permette all'amministratore di gestire tutti òe prenotazioni
	 * presenti sul database.
	 * @access public
	 * @return mixed
	 */
	public function vediPrenotazioni(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		$FPrenotazione=new FPrenotazione();
		$prenotazione=$FPrenotazione->loadall();
		if ($prenotazione!=false) {
			$i=0;
			while ($i<count($prenotazione)) {
				$this->_array_dati_partite[$i]=$prenotazione[$i]->getAllArray();
				$i++;
			}
			$view->impostaDati('datiPartite', $this->_array_dati_partite);
		}
		$session->imposta_valore('prenotazioniamministratore','pm');
		$view->setLayout('amministratore_prenotazioni');
		return $view->processaTemplate();
		
	}
	
	/**
	 * La funzione imposta la pagina che permette all'amministratore di gestire tutti i profili
	 * presenti sul database.
	 * @access public
	 * @return mixed
	 */
	public function vediProfili(){
		$view = USingleton::getInstance('VAmministratore');
		$session=USingleton::getInstance('USession');
		
        $FUtente = new FUtente();
        $utenti= $FUtente->loadall();
		if ($utenti!=false) {
			for($i=0; $i<count($utenti); $i++){
				$dati_utente[$i]=$utenti[$i]->getAllArray();
			}
			$view->impostaDati('datiUtente', $dati_utente);
		}
		$session->imposta_valore('profiliamministratore','pa');
		$view->setLayout('amministratore_profili');
		return $view->processaTemplate();
	}
	
	/**
	 * La funzione viene richiamata quando l'amministratore dalla pagina dei profili decide di 
	 * eliminarne uno, cancellando automaticamente anche tutte le prenotazioni effettuate, 
	 * gli annunci pubblicati e le partite create.
	 * @access public
	 * @return mixed
	 */
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
			$array_partite[$i]=$partite[$i]->getAllArray();
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
		
		$view->setLayout('amministratore_conferma_profilo_el');
		return $view->processaTemplate();
	}
	
	/**
	 * Esegue un controllo sul compito che viene richiesto e quindi esegue le
	 * dovute procedure affinchè il compito venga eseguito.
	 * @access public
	 * @return mixed
	 */
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