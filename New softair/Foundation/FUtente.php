<?php
/**
 * @access public
 * @package Foundation
 */
class FUtente extends Fdb{
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
		//$this->_key="(username, nome, cognome, password, email, via, codice_attivazione, stato, citta, CAP, foto, punti, giocate, vittorie)";
        $this->_return_class='EUtente';
        $this->db = USingleton::getInstance('Fdb');      
	}
    
    
    /**
     * Seleziona sul database gli utenti in base ai punti
     *
     * @return array
     */
    public function getUtentiPunti(){
    	$query='SELECT * FROM `utente`ORDER BY `utente`.`punti` DESC ';
        $this->db->query($query);
		return $this->getObjectArray();
    }
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` WHERE `username` !='."'AMMINISTRATORE'" ;
    	$this->db->query($query);
		return $this->getObjectArray();
    }
    
}

?>
