<?php
/**
 * @access public
 * @package Foundation
 */
class FUtente extends Fdb{
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('Fdb');
    }
	
	public function store( $utente) {
        parent::store($utente);
        
    }
    public function load ($idutente) {
        $utente=parent::load($idutente);
        return $utente;
    }

    public function delete( & $utente) {
        parent::delete($utente);
    }
}

?>
