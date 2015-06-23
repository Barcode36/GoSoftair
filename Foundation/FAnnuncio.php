<?php
/**
 * @access public
 * @package Foundation
 */
class FAnnuncio extends Fdb{
    public function __construct() {
        $this->_table='annuncio';
        $this->_key='idannuncio';
        $this->_return_class='EAnnuncio';
        USingleton::getInstance('Fdb');
    }
	
	public function store( $annuncio) {
        parent::store($annuncio);
        
    }
    public function load ($idannuncio) {
        $annuncio=parent::load($idannuncio);
        return $annuncio;
    }

    public function delete( & $idannuncio) {
        parent::delete($idannuncio);
    }
	
	
	/**
     * Seleziona sul database gli annunci di un utente
     *
     * @return array
     */
    public function getAnnunciUtente($username){
        $query='SELECT * ' .
                'FROM `annuncio` '
				'WHERE `autore=$username`';
        $this->query($query);
        return $this->getResultAssoc();
    }
    
}
}

?>