<?php
/**
 *
 * @package view
 */
/**
 * Classe VAnnunci, estende la classe view del package System 
 *
 * @package View
 */
class VAnnunci extends View {
    /**
     *
     * @var string $_layout
     */
    private $_layout='default'; 
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione degli annunci) passato per GET o POST
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }
    /**
     * Restituisce l'id dell'annuncio passato per GET o POST
     *
     * @return mixed
     */
    public function getIdPartita() {
        if (isset($_REQUEST['id_annuncio'])) {
            return $_REQUEST['id_annuncio'];
        } else
            return false;
    }
    /**
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('annunci_'.$this->_layout.'.tpl');
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
     * Restituisce il nome del task richiesto tramite GET o POST
     *
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
     *
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }
	
	public function getDatiCreaAnnuncio() {
        $dati_richiesti=array('Titolo','Prezzo','Descrizione','Numero', 'Immagine');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
            	$dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }

}

?>