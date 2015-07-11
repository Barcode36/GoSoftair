<?php
/**
 * File VCreaPartita.php contenente la classe VCreaPartita
 *
 * @package view
 */
/**
 * Classe VCreaPartita, estende la classe view del package System e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VCreaPartita extends View {
    /**
     * @var string $_layout
     */
    private $_layout='default';
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
    /**
     * @return string
     */
    public function processaTemplate() {
        $contenuto=$this->fetch('crea_partita.tpl');
        return $contenuto;
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
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore){
        $this->assign($key,$valore);
    }
    /**
     * Restituisce l'array contenente i dati di creazione
     *
     * @return array();
     */
    public function getDatiCreaPartita() {
        $dati_richiesti=array('titolo','indirizzo','descrizione','data','ngiocatori','categoria','prezzo');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
                $dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }
    

}

?>