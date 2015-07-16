<?php
/**
 * File VPartita.php contenente la classe VCreaPartita
 *
 * @package view
 */
/**
 * Classe VPartita, estende la classe view del package System e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VPartita extends View {
    /**
     * @var string $_layout
     */
    private $_layout='crea';
     /**
     * restituisce la username passata tramite GET o POST
     *
     * @return mixed
     */
    public function gettitolo() {
        if (isset($_REQUEST['Titolo']))
            return $_REQUEST['Titolo'];
        else
            return false;
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
    /**
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
	
	public function setLayout($layout) {
        $this->_layout=$layout;
    }
	
    /**
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('partita_'.$this->_layout.'.tpl');
    }
    /**
     * Imposta l'eventuale errore nel template
     *
     * @param string $errore
     */
    public function impostaErrore($errore){
        $this->assign('errore',$errore);
    }
    
    /**
     * Ritorna l'id della partita passato tramite GET o POST
     *
     * @return mixed
     */
    public function getIdPartita() {
    	if (isset($_REQUEST['id_partita'])) {
    		return $_REQUEST['id_partita'];
    	} else
    		return false;
    }
    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore){
        $this->assign($key,$valore);
    }
	/**
     * recupera dal vettore _FILE il nome temporaneo del file.
     * 
     * @return string
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
     * 
     * @return string
     */
    public function getOriginalFile(){
        if(isset($_FILES['Immagine']['name'])){
            return $_FILES['Immagine']['name'];
        }else{
            return false;
        }
    }
    /**
     * Restituisce l'array contenente i dati di creazione
     *
     * @return array();
     */
    public function getDatiCreaPartita() {
        $dati_richiesti=array('Titolo','Indirizzo','Descrizione','Giorno', 'Mese', 'Anno','Giocatori', 'Attrezzatura','Prezzo', 'Categoria', 'Partecipazione');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
            	$dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }
    

}

?>