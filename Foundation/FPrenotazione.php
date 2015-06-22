<?php
/**
 * @access public
 * @package Foundation
 */
class FPrenotazione extends Fdb{
    public function __construct() {
        $this->_table='prenotazione';
        $this->_key='idpren';
        $this->_auto_increment=true;
        $this->_return_class='Eprenotazione';
        USingleton::getInstance('Fdb');
    }
    public function store($pren){
       parent::store($pren);
    
    }
    public function load($idpren){
        $pren=parent::load($idpren);
        return $pren;
    }
	
	public function delete( $idpren) {
        parent::delete($idpren);
    }
	
	public function getPartiteDiUtente($idu){
        $query='SELECT DISTINCT `utente` ' .
                'FROM `prenotazione` '
				'WHERE `username=$idu`';;
        $this->query($query);
        return $this->getResultAssoc();
    }
	
	public function getUtentiDiPartita($idp){
        $query='SELECT DISTINCT `partita` ' .
                'FROM `prenotazione` '
				'WHERE `idpartita=$idp`';
        $this->query($query);
        return $this->getResultAssoc();
    }
}

?>
