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
class FPrenotazione extends Fdb{

	/**
	*
    * Costruttore di FPrenotazione, crea una tabella  prenotazione con chiave idpren
	*
    */
    public function __construct() {
        $this->_table='prenotazione';
        $this->_key='idpren';
        $this->_auto_increment=true;
        $this->_return_class='Eprenotazione';
        USingleton::getInstance('Fdb');
    }
	
	/**
    * Funzione che fa lo store di una prenotazione nella tabella
    *
    * @param EPrenotazione $pren
    *
    */
    public function store($pren){
       parent::store($pren);
    
    }
	
	/**
    * Funzione che carica una prenotazione dalla tabella
    *
    * @param string $idpren
    * @return EPrenotazione
    */
    public function load($idpren){
        $pren=parent::load($idpren);
        return $pren;
    }
	
	/**
    * Funzione che cancella una partita dalla tabella
    *
    * @param string $idpren
    *
    */
	public function delete( $idpren) {
        parent::delete($idpren);
    }
	
	/**
    * Funzione che restituisce le partite a cui si è inscritto un utente
    *
    * @param string $idu
    * @return array
    */
	public function getPartiteDiUtente($idu){
        $query='SELECT DISTINCT `utente` ' .
                'FROM `prenotazione` '
				'WHERE `username=$idu`';;
        $this->query($query);
        return $this->getResultAssoc();
    }
	
	/**
    * Funzione che restituisce gli utenti inscritti a una partita
    *
    * @param string $idp
    * @return array
    */
	public function getUtentiDiPartita($idp){
        $query='SELECT DISTINCT `partita` ' .
                'FROM `prenotazione` '
				'WHERE `idpartita=$idp`';
        $this->query($query);
        return $this->getResultAssoc();
    }
}

?>
