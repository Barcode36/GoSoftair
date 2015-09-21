<?php
/**
 * @access public
 * @package Foundation
 */
class FPrenotazione extends Fdb{
    
	public function __construct() {
                parent::__construct();

        $this->_table='prenotazione';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EPrenotazione';
        USingleton::getInstance('Fdb');
    }
    
    
	//cancella tutte le prenotazioni relative a una partita o un utente passandogli l'array di prenotazioni relative
    public function deleteRel($prenotazioni) {
    			$i=0;
    			while ($i<count($prenotazioni)) {
    				$this->delete($prenotazioni[$i]);
    				$i++;
    			}
    }

    
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table;
    	$this->query($query);
    	return $this->getObjectArray();
    }    
    
    
    public function loadfromuser($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE utenteusername = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    public function loadfrompartita($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE partitaID = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    
}

?>
