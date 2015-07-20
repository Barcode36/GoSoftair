<?php
/**
 * Descrizione di CProfilo
 * Gestisce la pagina di profilo di un utente, compresa la modifica dei dati 
 * dell'utente nel database e le relative pagine che permettono questi servizi
 * 
 * @package Control
 * @access public
 */
class CProfilo {
    /**
     * un array contenente i dati dell'utente
     * @var string[]
     */
    private $_array_dati_utente;
    /**
     * un array contenente i dati delle partite prenotate
     * @var string[]
     */
    private $_array_dati_partite;
    /**
     * un array contenente i degli annunci pubblicati
     * @var string[]
     */
    private $_array_dati_annunci=array();
    /**
     * variabile che contiene l'utente attuale
     * @var EUtente
     */
    private $_utente;
    /**
     * Passa i dati relativi all'utente partire prenotazte che restituisce una pagina contenente
     * la pagina profilo
     * @return mixed
     */
    public function apriProfilo(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$view->getUsername();
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    		$view->impostaDati('datiUtente', $this->_array_dati_utente);
    		
    		$FPrenotazione=new FPrenotazione();
    		$prenotazione=$FPrenotazione->loadfromuser($username);
    		if ($prenotazione!=false) {
    			$i=0;
    			while ($i<count($prenotazione)) {
					$this->_array_dati_partite[$i]=get_object_vars($prenotazione[$i]);
    				$i++;
    			}
        		$view->impostaDati('datiPartite', $this->_array_dati_partite);
    		}
    		
    		$FAnnuncio=new FAnnuncio();
    		$annuncio=$FAnnuncio->loadfromuser($username);
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
    		
    		$FPartita=new FPartita();
    		$partita=$FPartita->loadfromcreatore($username);
    		if ($partita!=false) {
    			for ($i=0; $i<count($partita); $i++) {
    				
    				$date=USingleton::getInstance('UData');
    				$dataPartita=$partita[$i]->getData();
    				$giorni=$date->diff_daoggi($dataPartita);
    				
    				if($giorni>7){
    					$FPrenotazione=new FPrenotazione();
    					$prenoRelative=$FPrenotazione->loadfrompartita($partita[$i]->getId());
    					if ($prenoRelative!='')
    						$FPrenotazione->deleteRel($prenoRelative);
    					$FCommento=new FCommento();
    					$commRelative=$FCommento->loadCommenti($partita[$i]->getId());
    					if ($commRelative!='')
    						$FCommento->deleteRel($commRelative);
    					$FPartita->delete($partita[$i]);
    				}
    				else{
    					$partite_create[$i]=get_object_vars($partita[$i]);
    					$start = DateTime::createFromFormat('Y-m-d',$partita[$i]->getData());
    					$partite_create[$i]['data']=$start->format('d/m/Y');
    				}
    			}
    			$view->impostaDati('datiPartiteCreate', $partite_create);
    		}

    	}
    	$view->impostaDati('task','apri');
        return $view->processaTemplate();
    }
    
    
    public function modUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$view->getUsername();
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    	}
    	$session->imposta_valore('utente',$username);
    	$view->setLayout('modifica_utente');
    	$view->impostaDati('datiUtente', $this->_array_dati_utente);
    	return $view->processaTemplate();
    }
    
    public function salvaUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$FUtente = new FUtente();
    	$EUtente = new EUtente();
    	$dati_modifica=$view->getDatiModUtente();
    	
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('utente');
    	$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    	}
    	$EUtente->setUtenteMod($dati_modifica['nome'], $dati_modifica['cognome'], $username, $dati_modifica['password'], $dati_modifica['email'], $dati_modifica['via'], $dati_modifica['CAP'], $dati_modifica['citta'], $this->_array_dati_utente['codice_attivazione'], $this->_array_dati_utente['stato'], $this->_array_dati_utente['foto']);
    	$file=$view->getFile();
		if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/profili/".$session->leggi_valore('username').'/';
            $target=$dir.'profilo'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EUtente->setFoto($target);               
                unlink($this->_array_dati_utente['foto']);
            }
        }
		$FUtente->update($EUtente);
		$username=$session->leggi_valore('username');
		if($username=='AMMINISTRATORE'){
			$anam=$session->leggi_valore('profiliamministratore');
			$view->impostaDati('anam', $anam);}
    	$view->setLayout('conferma_modifica');
    	return $view->processaTemplate();	
    }
    
    
    
    
    public function modPrenotazione(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDprenotazione=$view->getIdprenotazione();
    	$FPrenotazione = new FPrenotazione();
    	$prenotazione=$FPrenotazione->load($IDprenotazione);
    	if ($prenotazione!=false) {
    		$dati_prenotazione=get_object_vars($prenotazione);
    		$view->impostaDati('datiPrenotazione', $dati_prenotazione);
    		$session->imposta_valore('utenteusername',$dati_prenotazione['utenteusername']);
    		$session->imposta_valore('IDprenotazione',$IDprenotazione);
    		$session->imposta_valore('titolo',$dati_prenotazione['titoloPartita']);
    		$session->imposta_valore('partitaID',$dati_prenotazione['partitaID']);
    	}
    	$view->setLayout('modifica_prenotazione');
    	return $view->processaTemplate();
    	
    }
    
    
    public function salvaPrenotazione(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$FPrenotazione = new FPrenotazione();
    	$EPrenotazione = new EPrenotazione();
    	$dati_modifica=$view->getDatiModPrenotazione();
    	$username=$session->leggi_valore('username');
    	$IDprenotazione=$session->leggi_valore('IDprenotazione');
    	$titolo=$session->leggi_valore('titolo');
    	$partitaID=$session->leggi_valore('partitaID');
    	$utente=$session->leggi_valore('utenteusername');
    	$EPrenotazione->setPrenotazioneMod($IDprenotazione, $partitaID, $titolo, $utente, $dati_modifica['attrezzatura']);
    	$FPrenotazione->update($EPrenotazione);
    	$username=$session->leggi_valore('username');
    	if($username=='AMMINISTRATORE'){
    		$anam=$session->leggi_valore('prenotazioniamministratore');
    		$view->impostaDati('anam', $anam);}
    	$view->setLayout('conferma_modifica');
    	return $view->processaTemplate();
    }
    
    
    public function eliminaPrenotazione(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDprenotazione=$view->getIdprenotazione();
    	$FPrenotazione = new FPrenotazione();
    	$prenotazione=$FPrenotazione->load($IDprenotazione);
    	$FPrenotazione->delete($prenotazione);
    	$FPartita = new FPartita();
    	$PartitaID=$prenotazione->getPartitaID();
    	$partita=$FPartita->load($PartitaID);
    	$ndisponibili=$partita->getNdisponibili();
    	$partita->setNdisponibili($ndisponibili+1);
    	$FPartita->update($partita);
    	$username=$session->leggi_valore('username');
    	if($username=='AMMINISTRATORE'){
    		$anam=$session->leggi_valore('prenotazioniamministratore');
    		$view->impostaDati('anam', $anam);}
    	$view->setLayout('conferma_eliminazione');
    	return $view->processaTemplate();
    }
    
    
    
    public function modAnnuncio(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDannuncio=$view->getIdAnnuncio();
    	$FAnnuncio = new FAnnuncio();
    	$annuncio=$FAnnuncio->load($IDannuncio);
    	if ($annuncio!=false) {
    		$this->_array_dati_annunci=get_object_vars($annuncio);
    		$view->impostaDati('datiAnnuncio', $this->_array_dati_annunci);
    		$session->imposta_valore('IDannuncio',$IDannuncio);
    		$session->imposta_valore('data',$this->_array_dati_annunci['data']);
    		$session->imposta_valore('immagine',$this->_array_dati_annunci['immagine']);
    	}
    	$view->setLayout('modifica_annuncio');
    	return $view->processaTemplate();
    }
    
    public function salvaAnnuncio(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$FAnnuncio = new FAnnuncio();
    	$EAnnuncio = new EAnnuncio();
    	$dati_modifica=$view->getDatiModAnnuncio();
    	$IDannuncio=$session->leggi_valore('IDannuncio');
    	$data=$session->leggi_valore('data');
    	$EAnnuncio->setAnnuncioMod($dati_modifica['titolo'], $dati_modifica['prezzo'], $dati_modifica['descrizione'], $dati_modifica['telefono'], $dati_modifica['autoreusername'], $IDannuncio, $data );
		$file=$view->getFile();
		if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/annunci/".$session->leggi_valore('username').'/';
            $target=$dir.'profilo'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EAnnuncio->setImmagine($target); 
                $immagine=$session->leggi_valore('immagine');
                unlink($immagine);             
                
            }
        }
    	$FAnnuncio->update($EAnnuncio);
    	$username=$session->leggi_valore('username');
    	if($username=='AMMINISTRATORE'){
    		$anam=$session->leggi_valore('annunciamministratore');
    		$view->impostaDati('anam', $anam);}
    	$view->setLayout('conferma_modifica');
    	return $view->processaTemplate();
    }
    
    public function eliminaAnnuncio(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDannuncio=$view->getIdAnnuncio();
    	$FAnnuncio = new FAnnuncio();
    	$annuncio=$FAnnuncio->load($IDannuncio);
    	$FAnnuncio->delete($annuncio);
    	$username=$session->leggi_valore('username');
    	if($username=='AMMINISTRATORE'){
    		$anam=$session->leggi_valore('annunciamministratore');
    		$view->impostaDati('anam', $anam);}
    	$view->setLayout('conferma_eliminazione');
    	return $view->processaTemplate();
    }
    
    public function assegnaPunti(){
    	$view = USingleton::getInstance('VProfilo');
    	$date=USingleton::getInstance('UData');
    	$session=USingleton::getInstance('USession');
    	$idpartita=$view->getIdPartita();
    	$FPartita = new FPartita();
    	$partita=$FPartita->load($idpartita);
    	$votata=$partita->getVotata();
    	if($votata=='non_votata')
    	{
    		$datiPartita=get_object_vars($partita);
    		$giorni=$date->diff_daoggi($datiPartita['data']);
    		if($giorni>0){
    			$start = DateTime::createFromFormat('Y-m-d',$partita->getData());
   		 		$datiPartita['data']=$start->format('d/m/Y');
    	
    			$FPrenotazione = new FPrenotazione();
    			$prenotazioni=$FPrenotazione->loadfrompartita($idpartita);
    			if($prenotazioni!=''){
    				for($i=0; $i<count($prenotazioni); $i++){
    					$datiPrenotazioni[$i]=get_object_vars($prenotazioni[$i]);
    					$listaUtenti[$i]=$datiPrenotazioni[$i]['utenteusername'];
    					$numero[$i]=$i;
    				}
    				$session->imposta_valore('idpartita',$idpartita);
    				$session->imposta_valore('nprenotati',count($prenotazioni));
    				$session->imposta_valore('utenti',$listaUtenti);
    				$view->impostaDati('utenti',$listaUtenti);
    			} 
    			$view->impostaDati('datiPartita',$datiPartita);
    		}
    	}
    	$view->impostaDati('votata',$votata);
    	$view->setLayout('assegna_punti');
    	return $view->processaTemplate();
    }
    
    
    
    public function salvaVoti(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$nprenotati=$session->leggi_valore('nprenotati');
    	$listaUtenti=$session->leggi_valore('utenti');
    	$voti=$view->getVoti($listaUtenti);
    	$FUtente = new FUtente();
    	for($i=0; $i<$nprenotati; $i++){
    		$utente[$i]=$FUtente->load($listaUtenti[$i]);
    		$punti=$utente[$i]->getPunti();
    		$utente[$i]->setPunti($voti[$i]+$punti);
    		$FUtente->update($utente[$i]);
    	}
    	$FPartita = new FPartita();
    	$idpartita=$session->leggi_valore('idpartita');
    	$partita=$FPartita->load($idpartita);
    	$partita->setVotata('votata');
    	$FPartita->update($partita);
    	$view->setLayout('conferma_punti');
    	return $view->processaTemplate();
    	
    }
    
    /**
     * Imposta l'utente attuale
     * @param string
     */
    public function setUtente($username){
        $FUtente = new FUtente();
        $this->_utente = $FUtente->load($username);
    }
    
    
    /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinché il compito venga eseguito. Esegue inoltre un 
     * controllo di sessione. Se non � confermata viene visualizzato un 
     * messaggio d'errore.
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VProfilo');
        switch ($view->getTask()){
            case 'apri':
                return $this->apriProfilo();
            case 'modutente':
                return $this->modUtente();
            case 'salvautente':
                return $this->salvaUtente();
            case 'modprenotazione':
                return $this->modPrenotazione();
            case 'salvaprenotazione':
                return $this->salvaPrenotazione();            
            case 'eliminaprenotazione':
                return $this->eliminaPrenotazione();
            case 'modannuncio':
                return $this->modAnnuncio();
            case 'salvaannuncio':
                return $this->salvaAnnuncio();
            case 'eliminaannuncio':
                return $this->eliminaAnnuncio(); 
            case 'assegnapunti':
                return $this->assegnaPunti();
            case 'salvavoti':
                	return $this->salvaVoti();
        }
     }
}
