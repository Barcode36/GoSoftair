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
    
}
