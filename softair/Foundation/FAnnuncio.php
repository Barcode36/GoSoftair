<?php
/**
 * Descrizione di FAnnuncio
 * Foundation di Annuncio
 * 
 * @package Foundation
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class FAnnuncio extends Fdb {
    public function __construct() {
        $this->_table='annuncio';
        $this->_key='IDannuncio';
        $this->_return_class='EAnnuncio';
        USingleton::getInstance('Fdb');
    }
    
     /**
     * Seleziona sul database gli annunci 
     *
     * @return array
     */
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ORDER BY `annuncio`.`data` ASC';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
	/**
     * Seleziona sul database gli annunci di un utente
     *
     * @param string $key
     * @return array
     */
	public function loadfromuser($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE autoreusername = \''.$key.'\'';
    	$this->query($query); 
    	return $this->getObjectArray();
    }
    
	/**
     * Elimina sul database gli annunci 
     *
     * @param array $annunci
     */
    public function deleterel($annunci){
    	for($i=0; $i<count($annunci); $i++)
    		$this->delete($annunci[$i]);
    	
    }
	
}

?>