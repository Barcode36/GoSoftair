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
    }
    /*public function store( $partita) {
        parent::store($partita);
        $FCommento=new FCommento();
        $arrayCommentiEsistenti=$FCommento->loadCommenti($partita->IDpartita);
        if ($arrayCommentiEsistenti!=false) {
            foreach ($arrayCommentiEsistenti as $itemCommento) {
                $FCommento->delete($itemCommento);
            }
        }
        $arrayCommenti=$partita->getCommenti();
        foreach ($arrayCommenti as &$commento) {
            $commento->partitaIDpartita=$partita->IDpartita;
            $FCommento->store($commento);
        }
    }*/
    public function load ($key) {
        $partita=parent::load($key);
        $FCommento=new FCommento();
        $arrayCommenti=$FCommento->loadCommenti($partita->IDpartita);
        $partita->_commento=$arrayCommenti;
        return $partita;
    }

    public function delete( & $partita) {
        $arrayCommenti=& $partita->getCommenti();
        $FCommento= new FCommento();
        foreach ($arrayCommenti as &$commento) {
            $FCommento->delete($commento);
        }
        parent::delete($partita);
    }
    
    public function loadfromcreatore($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE autore = \''.$key.'\'';
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
