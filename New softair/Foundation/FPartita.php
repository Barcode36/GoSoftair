<?php
/**
 * @access public
 * @package Foundation
 */
class FPartita extends Fdb {
    public function __construct() {
        $this->_table='partita';
        $this->_key='IDpartita';
		//$this->_key="(IDpartita, titolo, indirizzo,ngiocatori,ndisponibili,autore,data, ora, prezzo, attrezzatura, descrizione, categoria, immagine, votata)";
        $this->_return_class='EPartita';
        $this->db = USingleton::getInstance('Fdb');
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
        $arrayCommenti=$FCommento->loadCommenti($partita->getId());
        $partita->setCommento($arrayCommenti);
        return $partita;
    }

    /*public function delete( & $partita) {
        $arrayCommenti=& $partita->getCommenti();
        $FCommento= new FCommento();
        foreach ($arrayCommenti as &$commento) {
            $FCommento->delete($commento);
        }
        parent::delete($partita);
    }*/
    
    public function loadfromcreatore($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE autore = \''.$key.'\'';
    	return $this->db->query($query)->getObjectArray();
    }
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ORDER BY `partita`.`data` ASC';
    	return $this->db->query($query)->getObjectArray();
    }
    
     /**
     * Seleziona sul database le diverse categorie esistenti per le varie partite
     *
     * @return array
     */
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `partita` ';
		$res=$this->db->query($query, PDO::FETCH_ASSOC);
        return $res;
    }
    
}

?>
