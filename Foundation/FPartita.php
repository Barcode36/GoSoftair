<?php
/**
 * @access public
 * @package Foundation
 */
class FPartita extends Fdb {
    public function __construct() {
        $this->_table='partita';
        $this->_key='idpartita';
        $this->_return_class='EPartita';
        USingleton::getInstance('Fdb');
    }
    public function store( $partita) {
        parent::store($partita);
        
    }
    public function load ($idpartita) {
        $partita=parent::load($idpartita);
        return $partita;
    }

    public function delete( & $partita) {
        parent::delete($partita);
    }
    
     /**
     * Seleziona sul database le diverse categorie esistenti per i vari libri
     *
     * @return array
     */
    public function getPartiteLuogo($luogo){
        $query='SELECT * ' .
                'FROM `partita` '
				'WHERE `luogo=$luogo`';
        $this->query($query);
        return $this->getResultAssoc();
    }
    
}

?>
