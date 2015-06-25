<?php
/**
 *
 * Classe FPartita 
 * @access public
 * @package Foundation
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class FAnnuncio extends Fdb{

	/**
	*
    * Costruttore di FAnnuncio, crea una tabella annuncio con chiave idannuncio
	*
    */
    public function __construct() {
        $this->_table='annuncio';
        $this->_key='idannuncio';
        $this->_return_class='EAnnuncio';
        USingleton::getInstance('Fdb');
    }
	
	/**
    * Funzione che fa lo store di un annuncio nella tabella
    *
    * @param EAnnuncio $annuncio
    *
    */
	public function store( $annuncio) {
        parent::store($annuncio);
        
    }
	
	/**
    * Funzione che carica un annuncio dalla tabella
    *
    * @param string $idannuncio
    * @return EAnnuncio
    */
    public function load ($idannuncio) {
        $annuncio=parent::load($idannuncio);
        return $annuncio;
    }

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