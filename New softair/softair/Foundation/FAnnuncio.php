<?php
/**
 * @access public
 * @package Foundation
 */
class FAnnuncio extends Fdb {
    public function __construct() {
        $this->_table='annuncio';
        $this->_key='IDannuncio';
        $this->_return_class='EAnnuncio';
        USingleton::getInstance('Fdb');
    }
    /**
     * Funzione che fa lo store di un annuncio nella tabella
     *
     * @param EAnnuncio $annuncio
     *
     */
    /*public function store( $annuncio) {
    	parent::store($annuncio);
    
    }*/
    /**
     * Funzione che cancella un annuncio dalla tabella
     *
     * @param string $idannuncio
     *
     */
    public function delete( & $idannuncio) {
    	parent::delete($idannuncio);
    }
    
    
    /**
     * Seleziona sul database gli annunci di un utente
     *
     * @param string $username
     * @return array
     */
   /* public function getAnnunciUtente($username){
    	$query='SELECT * ' .
    			'FROM `annuncio` '
    			'WHERE `autore=$username`';
    	$this->query($query);
    	return $this->getResultAssoc();
    }*/
    //c'� qualche errore nella query'
	
	
	public function loadfromuser($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE autoreusername = \''.$key.'\'';
    	$this->query($query); 
    	return $this->getObjectArray();
    }
	
}

?>