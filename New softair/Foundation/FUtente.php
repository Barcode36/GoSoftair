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
        $sth=$this->db->query($query);
		$numero_righe=$sth->rowCount();
		if ($numero_righe>0) {
            $return=array();
            while ($row = $sth->fetchObject("EUtente")) {
                $return[]=$row;
            }
            return $return;
        } else
            return false;
		
    }
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` WHERE `username` !='."'AMMINISTRATORE'" ;
    	$sth=$this->db->query($query);
		$result = $sth->fetchAll(PDO::FETCH_OBJ);
		return $result;
    }
    
}

?>
