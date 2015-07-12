<?php
/**
 * File VHome.php contenente la classe VHome
 *
 * @package view
 */
/**
 * Classe VHome, estende la classe view del package System e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VPrenotazione extends View {
    /**
     *
     * @var string $_layout
     */
    private $_layout='prenotazione'; 
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione delle partite) passato per GET o POST
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }
    /**
     * Restituisce l'id della partita passato per GET o POST
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
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('prenotazione_'.$this->_layout.'.tpl');
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
     * Restituisce l'array delle quantità per gli oggetti nel carrello
     *
     * @return mixed
     */
    public function getArrayQuantita() {
        if (isset($_REQUEST['quantita'])) {
            return $_REQUEST['quantita'];
        } else
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
    
    //************************************************
    public function getDatiCreaPrenotazione() {
        $dati_richiesti=array('attrezzatura');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
            	$dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }


}

?>