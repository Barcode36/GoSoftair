<?php

/**
 * @access public
 * @package Entity
 */
class EPrenotazione {
    /**
     * @AttributeType int
     */
    public $id;
    /**
     * @AttributeType Date
     */
    public $partitaID;
    public $titoloPartita;
    public $utenteusername;
    /**
     * @AttributeType boolean
     */
    public $attrezzatura=false;
  
    
    public function setPrenotazioneMod($id, $partitaID, $titoloPartita, $utenteusername, $attrezzatura) {
    	$this->id=$id;
    	$this->partitaID=$partitaID;
    	$this->titoloPartita=$titoloPartita;
    	$this->utenteusername=$utenteusername;
    	$this->attrezzatura=$attrezzatura;    	
    }

    public function setId($id) {
    	$this->id = $id;
    }
    
    public function setPartitaID($partitaID) {
    	$this->partitaID = $partitaID;
    }
    
    public function setTitoloPartita($titoloPartita) {
    	$this->titoloPartita = $titoloPartita;
    }
    
    public function setUtenteusername($utenteusername) {
    	$this->utenteusername = $utenteusername;
    }
    
    public function setAttrezzatura($attrezzatura) {
    	$this->attrezzatura = $attrezzatura;
    }
    
    public function getId() {
    	return $this->id;
    }
    
    public function getPartitaID() {
    	return $this->partitaID;
    }
    
    public function getTitoloPartita() {
    	return $this->titoloPartita;
    }
    
    public function getUtenteusername() {
    	return $this->utenteusername;
    }
    
    public function getAttrezzatura() {
    	return $this->attrezzatura;
    }
}
?>