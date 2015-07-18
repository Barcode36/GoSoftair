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
    	$query='SELECT * FROM `utente`ORDER BY `utente`.`punti` DESC LIMIT 5 ';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` WHERE `username` !='."'AMMINISTRATORE'" ;
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
}
/*'SELECT * ' .
'FROM `'.$this->_table.'` ' .
'WHERE `'.$this->_key.'` = \''.$key.'\'';*/

?>
