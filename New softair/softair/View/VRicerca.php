<?php
/**
 * Descrizione di VRicerca
 * Classe VRicerca, estende la classe view del package System e gestisce la visualizzazione 
 * e formattazione delle pagine di ricerca di partite del sito.
 *
 * @package View
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class VRicerca extends View {
   
	/**
     * @var string _layout
     */
    private $_layout='default';
    
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione della partite) 
     * passato per GET o POST
     * @access public
     * @return mixed
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }
    
    /**
     * Processa il layout scelto nella variabile _layout
     * @access public
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('ricerca_'.$this->_layout.'.tpl');
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
     * Ritorna l'id della partita passato tramite GET o POST
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
     * @access public
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }
    
    /**
     * Restituisce il commento
     * @access public
     * @return mixed
     */
    public function getCommento() {
        if (isset($_REQUEST['commento'])) {
            return $_REQUEST['commento'];
        } else
            return false;
    }
    
    /**
     * Restituisce categoria
     * @access public
     * @return mixed
     */
    public function getCategoria() {
        if (isset($_REQUEST['categoria']))
            return $_REQUEST['categoria'];
        else
            return false;
    }
    
    /**
     * restituisce la stringa di ricerca
     * @access public
     * @return mixed
     */
    public function getParola() {
        if (isset($_REQUEST['stringa']))
            return $_REQUEST['stringa'];
        else
            return false;
    }
}

?>