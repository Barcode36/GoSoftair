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
    private $_array_dati_annunci;
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
    	$username=$session->leggi_valore('username');
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
				$i=0;
    			while ($i<count($annuncio)) {
					$this->_array_dati_annunci[$i]=get_object_vars($annuncio[$i]);
    				$i++;
    			}
        		$view->impostaDati('datiAnnunci', $this->_array_dati_annunci);;
    		}
    	}
    	$view->impostaDati('task','apri');
        return $view->processaTemplate();
    }
    
    
    public function modUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    	}
    	$view->setLayout('modifica_utente');
    	$view->impostaDati('datiUtente', $this->_array_dati_utente);
    	return $view->processaTemplate();
    }
    
    public function salvaUtente(){
    	$view = USingleton::getInstance('VProfilo');
    	$FUtente = new FUtente();
    	$EUtente = new EUtente();
    	$dati_modifica=$view->getDatiModUtente();
    	
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
    	$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    	}
    	$EUtente->setUtenteMod($dati_modifica['nome'], $dati_modifica['cognome'], $username, $dati_modifica['password'], $dati_modifica['email'], $dati_modifica['via'], $dati_modifica['CAP'], $dati_modifica['citta'], $this->_array_dati_utente['codice_attivazione'], $this->_array_dati_utente['stato'], $this->_array_dati_utente['foto']);
    	$FUtente->update($EUtente);
    	$view->setLayout('conferma_modifica');
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
    	$username=$session->leggi_valore('username');
    	$IDannuncio=$session->leggi_valore('IDannuncio');
    	$EAnnuncio->setAnnuncioMod($dati_modifica['titolo'], $dati_modifica['prezzo'], $dati_modifica['descrizione'], $dati_modifica['telefono'], $dati_modifica['immagine'], $username, $IDannuncio );
    	$FAnnuncio->update($EAnnuncio);
    	$session->cancella_valore('IDannuncio');
    	$view->setLayout('conferma_modifica');
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
     * dovute procedure affinchÃ© il compito venga eseguito. Esegue inoltre un 
     * controllo di sessione. Se non è confermata viene visualizzato un 
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
            case 'modannuncio':
                return $this->modAnnuncio();
            case 'salvaannuncio':
                return $this->salvaAnnuncio();
        
        }
        }
}
