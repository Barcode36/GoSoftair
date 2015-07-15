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
	
	 /**
     * Seleziona sul database gli utenti in base ai punti
     *
     * @return array
     */
    public function getUtentiPunti(){
        $query='SELECT `username, punti` ' ;
                'FROM `utente` ';
				'ORDER BY `punti` DESC';
				'LIMIT `10`';
        $this->query($query);
        return $this->getResultAssoc();
    }
}

?>
