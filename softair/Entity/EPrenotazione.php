<?php

/**
 * Descrizione di EPrenotazione
 * Entita di Prenotazione
 *
 * @package Entity
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class EPrenotazione {
	/**
	 * @var $id Variabile contenente l'identificativo della prenotazione
	 * @AttributeType string
	 */
    private $id;
	/**
	 * @var $partitaID Variabile contenente l'identificativo della partita associatata alla prenotazione
	 * @AttributeType string
	 */
    private $partitaID;
    /**
     * @var $titoloPartita Variabile contenente il titolo della prenotazione
     * @AttributeType string
     */
    private $titoloPartita;
    /**
     * @var $utenteusername Variabile contenente l'usernme dell'utente prenotante
     * @AttributeType string
     */
    private $utenteusername;
	/**
	 * @var $attrezzatura Variabile contenente se � richiesta attrezzatura
	 * @AttributeType boolean
	 */
    private $attrezzatura=false;
    /**
     * @var $perterzi Variabile contenente il nunmero di posti prenotati per non iscritti 
     * 				  da parte dell'iscritto
     * @AttributeType int
     */
    private $perterzi;
  
    /**
     * Imposta i dati della prenotazione.
     * La funzione viene utilizzata quando � necessario apportare un modifica alla prenotazione.
     *
     * @access public
     * @param string $id
     * @param string $partitaID
     * @param string $titoloPartita
     * @param string $utenteusername
     * @param boolean $attrezzatura
     */
    public function setPrenotazioneMod($id, $partitaID, $titoloPartita, $utenteusername, $attrezzatura, $perterzi) {
    	$this->id=$id;
    	$this->partitaID=$partitaID;
    	$this->titoloPartita=$titoloPartita;
    	$this->utenteusername=$utenteusername;
    	$this->attrezzatura=$attrezzatura;
    	$this->perterzi=$perterzi;
    }

    /**
     * Imposta $id come  l'identificatico della prenotazione
     * @access public
     * @param string $id
     *
     */
    public function setId($id) {
    	$this->id = $id;
    }
    
    /**
     * Imposta $partitaID come  l'identificatico della partita relativa
     * @access public
     * @param string $partitaID
     *
     */
    public function setPartitaID($partitaID) {
    	$this->partitaID = $partitaID;
    }
    
    /**
     * Imposta $titoloPartita come il titolo della partita prenotata
     * @access public
     * @param string $titoloPartita
     *
     */
    public function setTitoloPartita($titoloPartita) {
    	$this->titoloPartita = $titoloPartita;
    }
    
    /**
     * Imposta $utenteusername come  l'username dell'utenteprenotante
     * @access public
     * @param string $utenteusername
     *
     */
    public function setUtenteusername($utenteusername) {
    	$this->utenteusername = $utenteusername;
    }
    
    /**
     * Imposta $attrezzatura come attrezzatura 
     * @access public
     * @param string $attrezzatura
     *
     */
    public function setAttrezzatura($attrezzatura) {
    	$this->attrezzatura = $attrezzatura;
    }
    
    /**
     * Imposta $perterzi come posti prenotati per utenti non registrati
     * @access public
     * @param int $perterzi
     *
     */
    public function setPerterzi($perterzi) {
    	$this->perterzi = $perterzi;
    }
    
    /**
     * restituisce un array contenente tutti gli attributi dell'oggetto
     * @access public
     * @return array Array associativo dove la chiave e il nome dell'attributo e il valore � il suo contenuto
     *
     */
    public function getAllArray() {
    	$dati=array('id'=> $this->id, 
    				'partitaID'=> $this->partitaID, 
    				'titoloPartita'=> $this->titoloPartita, 
    				'utenteusername'=> $this->utenteusername,
    				'attrezzatura'=> $this->attrezzatura,
    				'perterzi'=> $this->perterzi
    	);
    	return $dati;
    }
    
    
    /**
     * @access public
     * @return string Stringa contenente l'identificativo della prenotazione.
     *
     */
    public function getId() {
    	return $this->id;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'dentificativo relatico alla partita.
     *
     */
    public function getPartitaID() {
    	return $this->partitaID;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il titolo della partita prenotata.
     *
     */
    public function getTitoloPartita() {
    	return $this->titoloPartita;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'username dell'utenteprenotante.
     *
     */
    public function getUtenteusername() {
    	return $this->utenteusername;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'attrezzatura.
     *
     */
    public function getAttrezzatura() {
    	return $this->attrezzatura;
    }
    
    /**
     * @access public
     * @return int Intero contenente il numero di posti prenotati perterzi.
     *
     */
    public function getPerterzi() {
    	return $this->perterzi;
    }
}
?>