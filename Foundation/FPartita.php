<?php
/**
 *
 * Classe FPartita 
 * @access public
 * @package Foundation
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class FPartita extends Fdb {
	
	/**
	*
    * Costruttore di FPartita, crea una tabella  partita con chiave idpartita
	*
    */
    public function __construct() {
        $this->_table='partita';
        $this->_key='idpartita';
        $this->_return_class='EPartita';
        USingleton::getInstance('Fdb');
    }
	
	/**
    * Funzione che fa lo store di una partita nella tabella
    *
    * @param EPartita $partita
    *
    */
    public function store( $partita) {
        parent::store($partita);
        
    }
	
	/**
    * Funzione che carica una partita dalla tabella
    *
    * @param string $idpartita
    * @return EPartita
    */
    public function load ($idpartita) {
        $partita=parent::load($idpartita);
        return $partita;
    }

	/**
    * Funzione che cancella una partita dalla tabella
    *
    * @param EPartita $partita
    *
    */
    public function delete( & $partita) {
        parent::delete($partita);
    }
    
     /**
     * Seleziona sul database le partite in base al luogo
     *
	 * @param string $luogo
     * @return array
     */
    /**public function getPartiteLuogo($luogo){
        $query='SELECT * ' .
                'FROM `partita` '
				'WHERE `luogo=$luogo`';
        $this->query($query);
        return $this->getResultAssoc();
    }*/
	
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `partita` ';
        $this->query($query);
        return $this->getResultAssoc();
    }
    
}

?>
