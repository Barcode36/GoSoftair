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
    	}
    	$view->impostaDati('task','apri');
        return $view->processaTemplate();        
    }
    
    
    public function modProfilo(){
    	$view = USingleton::getInstance('VProfilo');
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
		$this->setUtente($username);
    	if ($this->_utente!=false) {
    		$this->_array_dati_utente=get_object_vars($this->_utente);
    		$view->impostaDati('datiUtente', $this->_array_dati_utente);
    	}
    	$view->setLayout('modifica');
    	$view->impostaDati('datiUtente', $this->_array_dati_utente);
    	return $view->processaTemplate();
    }
    
    public function salvaProfilo(){
    	$view = USingleton::getInstance('VProfilo');
    	$FUtente = new FUtente();
    	$EUtente = new EUtente();
    	$dati_modifica=$view->getDatiModProfilo();
    	
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
            case 'modprofilo':
                return $this->modProfilo();
            case 'salvaprofilo':
                return $this->salvaProfilo();
            }
        }
}
