<?php
/**
 * Descrizione di FPrenotazione
 * Foundation di Prenotazione
 * 
 * @package Foundation
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class FPrenotazione extends Fdb{
    
	public function __construct() {
        $this->_table='prenotazione';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EPrenotazione';
        USingleton::getInstance('Fdb');
    }
    
    
	
	/**
     * Cancella tutte le prenotazioni relative a una partita o un utente passandogli l'array di prenotazioni relative
     *
     * @param array $prenotazioni
     */
    public function deleteRel($prenotazioni) {
    			$i=0;
    			while ($i<count($prenotazioni)) {
    				$this->delete($prenotazioni[$i]);
    				$i++;
    			}
    }

    
    /**
     * Seleziona tutte le prenotazioni 
     *
     * @return array
     */
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table;
    	$this->query($query);
    	return $this->getObjectArray();
    }    
    
    /**
     * Seleziona tutte le prenotazioni di un utente
     *
	 * @param string $key
     * @return array
     */
    public function loadfromuser($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE utenteusername = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
	 /**
     * Seleziona tutte le prenotazioni di una partita
     *
	 * @param string $key
     * @return array
     */
    public function loadfrompartita($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE partitaID = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    
}

?>
