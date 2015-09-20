<?php
/**
 * @access public
 * @package Foundation
 */
class FPartita extends Fdb {
    public function __construct() {
        $this->_table='partita';
        $this->_key='IDpartita';
        $this->_return_class='EPartita';
        USingleton::getInstance('Fdb');
        $this->connessione();
    }

    public function load ($key) {
        $partita=parent::load($key);
        $FCommento=new FCommento();
        $arrayCommenti=$FCommento->loadCommenti($partita->getId());
        $partita->setCommento($arrayCommenti);
        return $partita;
    }


    
    public function loadfromcreatore($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE autore = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ORDER BY `partita`.`data` ASC';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
     /**
     * Seleziona sul database le diverse categorie esistenti per le varie partite
     *
     * @return array
     */
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `partita` ';
        $this->query($query);
        return $this->getResultAssoc();
    }
    
}

?>
