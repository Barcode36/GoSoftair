<?php
/**
 * Descrizione di FUtente
 * Foundation di Annuncio
 * 
 * @package Foundation
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class FUtente extends Fdb{
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('Fdb');
    }
    
    /**
     * Seleziona sul database gli utenti in base ai punti
     *
     * @return array
     */
    public function getUtentiPunti(){
    	$query='SELECT * FROM `utente`ORDER BY `utente`.`punti` DESC ';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
	  /**
     * Carica tutti gli utenti
     *
     * @return array
     */
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` WHERE `username` !='."'AMMINISTRATORE'" ;
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
}


?>
