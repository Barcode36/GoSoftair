<?php
/**
 * Descrizione di CProfilo
 * Gestisce la pagina di profilo di un utente, compresa la modifica dei dati 
 * dell'utente nel database e le relative pagine che permettono questi servizi
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
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
     * La funzione imposta la pagina del profilo dell'utente mostrandogli i suoi dati e un resoconto
     * delle attivit� compiute,
     * In particolare prende l'username dell'utente dalla view, e grazie a questa prende da DB e
     * carica in array i dati dell'utente, le partite prenotate, gli annunci postati e le 
     * partite create. I dati negli array sono passati al template 'profilo_default'che li organizza,
     * principalmente in tabelle in cui � consentito all'utente di fare opportune modifiche.
     * @access public
     * @return mixed
     */
    public function apriProfilo(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
    	if($username=='AMMINISTRATORE'){
    		$mio=$view->getProfilo();
    		if($mio!='mio'){
    			$username=$view->getUtenteUsername();
    		}
    	}    		
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		
    		//in un array vengono caricati tutti i dati personali dell'utente
    		$this->_array_dati_utente=$this->_utente->getAllArray();
    		$view->impostaDati('datiUtente', $this->_array_dati_utente);
    		
    		//se l'utente che visualizza � l'amministratore vede anche dati di sistema
    		$diritti=$view->getDiritti();
    		if($diritti=='admin')
    			$view->impostaDati('diritti', $diritti);
    		
    		//in un array vengono caricate tutte le prenotazioni fatte
    		$FPrenotazione=new FPrenotazione();
    		$prenotazione=$FPrenotazione->loadfromuser($username);
    		if ($prenotazione!=false) {
    			for ($i=0; $i<count($prenotazione); $i++) {
					$this->_array_dati_partite[$i]=$prenotazione[$i]->getAllArray();
    			}
        		$view->impostaDati('datiPartite', $this->_array_dati_partite);
    		}
    		
    		//in un array vengono caricati tutti gli annunci pubblicati non scaduti
    		$FAnnuncio=new FAnnuncio();
    		$annuncio=$FAnnuncio->loadfromuser($username);
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
    		
    		//in un array vengono caricate tutte le partite create non pi� vecchie di 7 giorni fa
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
    					if ($prenoRelative!=''){ 
    						$FPrenotazione->deleteRel($prenoRelative);}
    					$FCommento=new FCommento();
    					$commRelative=$FCommento->loadCommenti($partita[$i]->getId());
    					if ($commRelative!=''){ 
    						$FCommento->deleteRel($commRelative);}
    					$FPartita->delete($partita[$i]);
    				}
    				else{
    					$partite_create[$i]=$partita[$i]->getAllArray();
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
    
    /**
	 * La funzione viene richiamata da profilo quando l'utente decide di modificare i dati 
	 * personali di registrazione. Prepara una forma analoga a quella utilizzata 
	 * per la registrazione precompilata con i dati premodifica.
     * @access public
     * @return mixed
     */
    public function modUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
        if($username=='AMMINISTRATORE'){
    		$mio=$view->getProfilo();
    		if($mio!='mio'){
    			$username=$view->getUtenteUsername();
    		}
    	}
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=$this->_utente->getAllArray();
    	}
    	$diritti=$view->getDiritti();
    	if($diritti=='admin'){
    		$session->imposta_valore('diritti',$diritti);
    		$view->impostaDati('diritti', $diritti);
    	}
    	$session->imposta_valore('utente',$username);
    	$view->setLayout('modifica_utente');
    	$view->impostaDati('datiUtente', $this->_array_dati_utente);
    	return $view->processaTemplate();
    }
    
    /**
     * La funzione viene richiamata quando l'utente conferma di aver terminato di modificare i
     * dati relativi alla registrazione. Fa semplicemente un aggiornamento sul database con i dati
     * inseriti nella modifica
     * @access public
     * @return mixed
     */
    public function salvaUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$FUtente = new FUtente();
    	$EUtente = new EUtente();
    	$dati_modifica=$view->getDatiModUtente();
    	
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('utente');
        if($username=='AMMINISTRATORE'){
    		$mio=$view->getProfilo();
    		if($mio!='mio'){
    			$username=$view->getUtenteUsername();
    		}
    	}
    	$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_utente->getAllArray();
    	}
    	$this->_utente->setUtenteMod($dati_modifica['nome'], $dati_modifica['cognome'], $username, $dati_modifica['password'], $dati_modifica['email'], $dati_modifica['via'], $dati_modifica['CAP'], $dati_modifica['citta'], $this->_array_dati_utente['codice_attivazione'], $this->_array_dati_utente['stato']);
    	//aggiungere controllo per amministratore per permettergli di modificare punti, giocate e vittorie
    	$file=$view->getFile();
		if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/profili/".$session->leggi_valore('username').'/';
            $target=$dir.'profilo'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
            	unlink($this->_utente->getFoto());
                $this->_utente->setFoto($target);               
            }
        }
        //se le modifiche sono fatte dall'amministratore vengono salvati anche i valori aggiuntivi
        //che pu� modificare solo l'amministratore
        $diritti=$session->leggi_valore('diritti');
        if($diritti=='admin'){
        	$dati_modifica_admin=$view->getDatiModUtenteAdmin();
        	$this->_utente->setCodiceattivazione($dati_modifica_admin['codice_attivazione']);
        	$this->_utente->setStato($dati_modifica_admin['stato']);
        	$this->_utente->setPunti($dati_modifica_admin['punti']);
        	$this->_utente->setGiocate($dati_modifica_admin['giocate']);
        	$this->_utente->setVittorie($dati_modifica_admin['vittorie']);
        }
        //aggiorna l'utente con tutte le modifiche fatte
		$FUtente->update($this->_utente);
		$username=$session->leggi_valore('username');
		if($username=='AMMINISTRATORE'){
			$anam=$session->leggi_valore('profiliamministratore');
			$view->impostaDati('anam', $anam);}
		$view->impostaDati('username', $username);
    	$view->setLayout('conferma_modifica');
    	return $view->processaTemplate();	
    }
    
    /**
     * La funzione viene richiamata dal profilo quando l'utente decide di modificare una delle
     *  prenotazioni effettuare. Prepara una form analoga a quella di prenotazione. 
     * @access public
     * @return mixed
     */
    public function modPrenotazione(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDprenotazione=$view->getIdprenotazione();
    	$FPrenotazione = new FPrenotazione();
    	$prenotazione=$FPrenotazione->load($IDprenotazione);
    	if ($prenotazione!=false) {
    		$dati_prenotazione=$prenotazione->getAllArray();
    		$view->impostaDati('datiPrenotazione', $dati_prenotazione);
    		$session->imposta_valore('utenteusername',$dati_prenotazione['utenteusername']);
    		$session->imposta_valore('IDprenotazione',$IDprenotazione);
    		$session->imposta_valore('titolo',$dati_prenotazione['titoloPartita']);
    		$session->imposta_valore('partitaID',$dati_prenotazione['partitaID']);
    	}
    	$view->setLayout('modifica_prenotazione');
    	return $view->processaTemplate();
    	
    }
    
    /**
     * La funzione viene richiamata quando l'utente conferma di aver terminato di modificare i
     * dati relativi alla prenotazione. Fa semplicemente un aggiornamento sul database con i dati
     * inseriti nella modifica.
     * @access public
     * @return mixed
     */
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
    
    /**
     * La funzione viene chiamata da profilori quando l'utente decide di cancellarsi da una 
     * prenotazione precedentemente effettuta. Viene effettuata una cancellazione dal DB e 
     * aggiornato il contatore che definisce il numero di posti liberi nella partita 
     * a cui era prenotato.
     * @access public
     * @return mixed
     */
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
    	$view->impostaDati('username', $username);
    	$view->setLayout('conferma_eliminazione');
    	return $view->processaTemplate();
    }
    
    /**
     * La funzione viene richiamata dal profilo quando l'utente decide di modificare uno degli
     * annunci pubblicati. Prepara una form analoga a quella di creazione dell'annuncio precompilata
     * con i dati premodifica.
     * @access public
     * @return mixed
     */
    public function modAnnuncio(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$IDannuncio=$view->getIdAnnuncio();
    	$FAnnuncio = new FAnnuncio();
    	$annuncio=$FAnnuncio->load($IDannuncio);
    	if ($annuncio!=false) {
    		$this->_array_dati_annunci=$annuncio->getAllArray();
    		$view->impostaDati('datiAnnuncio', $this->_array_dati_annunci);
    		$session->imposta_valore('IDannuncio',$IDannuncio);
    		$session->imposta_valore('data',$this->_array_dati_annunci['data']);
    		$session->imposta_valore('immagine',$this->_array_dati_annunci['immagine']);
    	}
    	$view->setLayout('modifica_annuncio');
    	return $view->processaTemplate();
    }
    
    /**
     * La funzione viene richiamata quando l'utente conferma di aver terminato di modificare i
     * dati relativi all'annuncio. Fa semplicemente un aggiornamento sul database con i dati
     * inseriti nella modifica.
     * @access public
     * @return mixed
     */
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
    	$view->impostaDati('username', $username);
    	$view->setLayout('conferma_modifica');
    	return $view->processaTemplate();
    }
    
    /**
     * La funzione viene richiamata da profilo quando l'utente decide di cancellare un
     * annuncio precedentemente pubblicato. Viene effettuata una cancellazione dal DB.
     * @access public
     * @return mixed
     */
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
    	$view->impostaDati('username', $username);
    	$view->setLayout('conferma_eliminazione');
    	return $view->processaTemplate();
    }
    
    /**
     * La funzione viene richiamata dal profilo quando un utente  vuole assegnare 
     * un punteggio ai giocatori che hanno partecipato a una partita da lui creata. 
     * L'operazione viene permessa solo dopo lo svolgimento della partita e solo una volta.
     * La funzione prepara una form dove per ogni utente prenotato alla partita si pu� assegnare
     * un punteggio da 1 a 5.
     * @access public
     * @return mixed
     */
    public function assegnaPunti(){
    	$view = USingleton::getInstance('VProfilo');
    	$date=USingleton::getInstance('UData');
    	$session=USingleton::getInstance('USession');
    	$idpartita=$view->getIdPartita();
    	$FPartita = new FPartita();
    	print $idpartita;
    	$partita=$FPartita->load($idpartita);
    	$votata=$partita->getVotata();
    	if($votata=='non_votata')
    	{
    		$datiPartita=$partita->getAllArray();
    		$giorni=$date->diff_daoggi($datiPartita['data']);
    		if($giorni>0){print 'giorni>0';
    			$start = DateTime::createFromFormat('Y-m-d',$partita->getData());
   		 		$datiPartita['data']=$start->format('d/m/Y');
    	
    			$FPrenotazione = new FPrenotazione();
    			$prenotazioni=$FPrenotazione->loadfrompartita($idpartita);
    			if($prenotazioni!=''){
    				print 'pre!=0';
    				for($i=0; $i<count($prenotazioni); $i++){
    					$datiPrenotazioni[$i]=$prenotazioni[$i]->getAllArray();
    					$listaUtenti[$i]=$datiPrenotazioni[$i]['utenteusername'];
    					$numero[$i]=$i;
    					print $listaUtenti[$i];
    				}
    				print count($prenotazioni);
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
    
    /**
     * La funzione viene richiamata quando l'utente conferma di aver terminato di inserire i
     * voti ai giocatori della partita creata. Fa semplicemente un aggiornamento sul database 
     * sommando per ogni utente partecipante il voto assegnato.
     * @access public
     * @return mixed
     */
    public function salvaVoti(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$nprenotati=$session->leggi_valore('nprenotati');
    	$listaUtenti=$session->leggi_valore('utenti');
    	$voti=$view->getVoti($listaUtenti);
    	print $voti['1'];
    	$FUtente = new FUtente();
    	for($i=0; $i<$nprenotati; $i++){
    		if($voti[$i]>0)
    		{
    			$utente[$i]=$FUtente->load($listaUtenti[$i]);
    			$punti=$utente[$i]->getPunti();
    			$giocate=$utente[$i]->getGiocate();
    			$utente[$i]->setPunti($punti+$voti[$i]);
    			$utente[$i]->setGiocate($giocate+1);
    			if($voti[$i]>=2)
    			{
    				$vittorie=$utente[$i]->getVittorie();
    				$utente[$i]->setVittorie($vittorie+1);
    			}
    			$FUtente->update($utente[$i]);
    		}
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
     * @access public
     * @param string
     */
    public function setUtente($username){
        $FUtente = new FUtente();
        $this->_utente = $FUtente->load($username);
    }
    
    
    /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinch� il compito venga eseguito.
     * @access public
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
