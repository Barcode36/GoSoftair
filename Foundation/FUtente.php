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
class FUtente extends Fdb{

	/**
	*
    * Costruttore di FUtente, crea una tabella  utente con chiave username
	*
    */
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('Fdb');
    }
	
	/**
    * Funzione che fa lo store di un utente nella tabella
    *
    * @param EUtente $utente
    *
    */
	public function store( $utente) {
        parent::store($utente);
        
    }
	
	/**
    * Funzione che carica un utente dalla tabella
    *
    * @param string $idutente
    * @return EUtente
    */
    public function load ($idutente) {
        $utente=parent::load($idutente);
        return $utente;
    }

	/**
    * Funzione che cancella un utente dalla tabella
    *
    * @param string $idutente
    *
    */
    public function delete( & $idutente) {
        parent::delete($idutente);
    }
}

?>
