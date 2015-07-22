<?php
/**
 * Descrizione di VAnnunci
 * Classe VAnnunci, estende la classe view del package System e gestisce la visualizzazione 
 * e formattazione la pagina di visualizzazione degli annunci.
 *
 * @package View
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class VAnnunci extends View {
    
    /**
     * @access private
     * @var string $_layout
     */
    private $_layout='default'; 
    
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione degli annunci) 
     * passato per GET o POST
     * @access public
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }

    /**
     * Restituisce id_annunci passatoo tramite GET o POST
     * @access public
     * @return mixed
     */
    public function getIDannuncio() {
    	if (isset($_REQUEST['id_annuncio'])) {
    		return $_REQUEST['id_annuncio'];
    	} else
    		return 0;
    }
    
    
    /**
     * Processa il layout scelto nella variabile _layout
     * @access public
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('annunci_'.$this->_layout.'.tpl');
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
     * Restituisce il nome del task richiesto tramite GET o POST
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
     * Imposta il layout
     * @access public
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }
	
	/**
     * recupera dal vettore _FILE il nome temporaneo del file.
     * @access public
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
     * @access public
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
     * recupera i dati necessari per la creazione di un annuncio.
     * @access public
     * @return string
     */
	public function getDatiCreaAnnuncio() {
        $dati_richiesti=array('Titolo','Prezzo','Descrizione','Numero', 'Data');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
            	$dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }

}

?>