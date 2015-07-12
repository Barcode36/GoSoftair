<?php

/**
 * Descrizione di VProfilo
 * VProfilo gestisce la comunicazione tra le richieste del client e 
 * la CProfilo, inoltre imposta le pagine del profilo utente e profilo esterno
 * @access public
 * @package View
 * @author Achieved Team
 */
class VProfilo extends View{
    /**
     * contiene il nome del layout della pagina di risposta
     * @var string
     */
    private $_layout='default';
    /**
     * Recupera il contenuto di un template e lo restituisce alla control
     * @return mixed
     */
    public function processaTemplate(){        
        return $this->fetch('profilo_'.$this->_layout.'.tpl');
    }
     /**
      * Imposta il layout       
      * @param string $layout
      */
      public function setLayout($layout) {
        	$this->_layout=$layout;
        }

    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore) {
    	$this->assign($key,$valore);
    }
    
    /**
     * @return mixed
     */
    public function getTask() {
    	if (isset($_REQUEST['task']))
    		return $_REQUEST['task'];
    	else
    		return false;
    }

    public function getIdprenotazione() {
    	if (isset($_REQUEST['id_prenotazione']))
    		return $_REQUEST['id_prenotazione'];
    	else
    		return false;
    }
    
    /**
     * Restituisce l'id dell'annuncio passato per GET o POST
     *
     * @return mixed
     */
    public function getIdAnnuncio() {
    	if (isset($_REQUEST['id_annuncio'])) {
    		return $_REQUEST['id_annuncio'];
    	} else
    		return false;
    }
    

    public function getDatiModAnnuncio() {
    	$dati_richiesti=array('titolo','prezzo','descrizione', 'telefono', 'immagine');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
    
   
    public function getDatiModUtente() {
    	$dati_richiesti=array('password','nome','cognome','via','CAP', 'citta', 'email');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
    
}
