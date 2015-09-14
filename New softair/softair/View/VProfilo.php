<?php
/**
 * Descrizione di VProfilo
 * Classe VProfilo, estende la classe view del package System e gestisce la visualizzazione
 * e formattazione della pagina del profilo dell'utente.
 *
 * @package View
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class VProfilo extends View{
    
    /**
     * contiene il nome del layout della pagina di risposta
     * @access private
     * @var string
     */
    private $_layout='default';
    
    /**
     * Recupera il contenuto di un template e lo restituisce alla control
     * @access public
     * @return mixed
     */
    public function processaTemplate(){        
        return $this->fetch('profilo_'.$this->_layout.'.tpl');
    }
     
     /**
      * Imposta il layout       
      * @access public
      * @param string $layout
      */
      public function setLayout($layout) {
        	$this->_layout=$layout;
        }

    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     * @access public
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore) {
    	$this->assign($key,$valore);
    }
    
    /**
     * @access public
     * @return mixed
     */
    public function getTask() {
    	if (isset($_REQUEST['task']))
    		return $_REQUEST['task'];
    	else
    		return false;
    }

    /**
     * Restituisce i voti della lista di utenti passati
     * @access public
     * @return mixed
     */
    public function getVoti($listaUtenti) {
    	for($i=0; $i<count($listaUtenti); $i++){
    		if (isset($_REQUEST[$listaUtenti[$i]]))
    			 $dati[$i]=$_REQUEST[$listaUtenti[$i]];
    	}
    	return $dati;
    }
    
    
    /**
     * Restituisce utente passato per GET o POST, metodo usato solo dall'amministatore
     * @access public
     * @return mixed
     */
    public function getUtenteUsername() {
    	if (isset($_REQUEST['utenteusername']))
    		return $_REQUEST['utenteusername'];
    	else
    		return false;
    }
    
    /**
     * Restituisce utente passato per GET o POST, metodo usato solo dall'amministatore
     * @access public
     * @return mixed
     */
    public function getProfilo() {
    	if (isset($_REQUEST['profilo']))
    		return $_REQUEST['profilo'];
    	else
    		return false;
    }
    
    
    
    /**
     * Restituisce username passato per GET o POST
     * @access public
     * @return mixed
     */
    public function getUsername() {
    	if (isset($_REQUEST['username']))
    		return $_REQUEST['username'];
    	else
    		return false;
    }
    
    /**
     * Restituisce diritti passato per GET o POST
     * specifica se l'utente che sta compiendo specifiche operazioni � l'amministratore
     * @access public
     * @return mixed
     */
    public function getDiritti() {
    	if (isset($_REQUEST['diritti']))
    		return $_REQUEST['diritti'];
    	else
    		return false;
    }
    
    /**
     * Restituisce id_prenotazione passato per GET o POST
     * @access public
     * @return mixed
     */
    public function getIdprenotazione() {
    	if (isset($_REQUEST['id_prenotazione']))
    		return $_REQUEST['id_prenotazione'];
    	else
    		return false;
    }
    
    /**
     * Restituisce l'id dell'annuncio passato per GET o POST
     * @access public
     * @return mixed
     */
    public function getIdAnnuncio() {
    	if (isset($_REQUEST['id_annuncio'])) {
    		return $_REQUEST['id_annuncio'];
    	} else
    		return false;
    }
     
    /**
     * Restituisce l'id della partita passato per GET o POST
     * @access public
     * @return mixed
     */
    public function getIdPartita() {
    	if (isset($_REQUEST['id_partita'])) {
    		return $_REQUEST['id_partita'];
    	} else
    		return false;
    }
    
    /**
     * recupera dal vettore _FILE il nome temporaneo del file.
     * @access public
     * @return mixed
     */
	public function getFile() {
        if(isset($_FILES['Immagine']['tmp_name'])&&($_FILES['Immagine']['type']=="image/jpeg"||$_FILES['Immagine']['type']=="image/x-png"||$_FILES['Immagine']['type']=="image/gif")){
            return $_FILES['Immagine']['tmp_name'];
        }else{
            return false;
        }
    }
	 
	 /**
     * recupera dal vettore _FILE il nome originale del file.
     * @access public
     * @return mixed
     */
    public function getOriginalFile(){
        if(isset($_FILES['Immagine']['name'])){
            return $_FILES['Immagine']['name'];
        }else{
            return false;
        }
    }

    /**
     * recupera i dati necessari per la modifica della prenotazione.
     * @access public
     * @return mixed
     */
    public function getDatiModPrenotazione() {
    	$dati_richiesti=array('attrezzatura');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
   
    /**
     * recupera i dati necessari per la modifica dell'annuncio.
     * @access public
     * @return mixed
     */
    public function getDatiModAnnuncio() {
    	$dati_richiesti=array('Titolo','Prezzo','Descrizione', 'Numero', 'autoreusername');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
    
    /**
     * recupera i dati necessari per la modifica dell'utente.
     * @access public
     * @return mixed
     */
    public function getDatiModUtente() {
    	$dati_richiesti=array('password','nome','cognome','via','CAP', 'citta', 'email');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
    
    /**
     * recupera i dati necessari per la modifica dell'utente modificabili solo dall'amministratore.
     * @access public
     * @return mixed
     */
    public function getDatiModUtenteAdmin() {
    	$dati_richiesti=array('codice_attivazione','stato','punti','giocate','vittorie');
    	$dati=array();
    	foreach ($dati_richiesti as $dato) {
    		if (isset($_REQUEST[$dato]))
    			$dati[$dato]=$_REQUEST[$dato];
    	}
    	return $dati;
    }
    
}
