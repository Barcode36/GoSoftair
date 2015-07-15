<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
    public $nome;
    public $cognome;
    public $username;
    public $password;
    public $email;
    public $via;
    public $CAP;
    public $citta;
    public $codice_attivazione;
    public $stato='non_attivo';
    public $foto;
	public $punti;
    /**
     * @AssociationType Entity.EPrenotazione
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_prenotazioni = array();
    /**
     * @access public
     * @return float
     * @ReturnType float
     */

    public function getUsername() {
    	return $this->username;
    }
    
    
    public function getNome() {
    	return $this->nome;
    }
    
    public function getCognome() {
    	return $this->cognome;
    }
    
    
    public function getEmail() {
    	return $this->email;
    }
    
    public function getVia() {
    	return $this->via;
    }
    
    public function getCAP() {
    	return $this->CAP;
    }
    
    public function getCitta() {
    	return $this->citta;
    }

    public function getPassword() {
    	return $this->password;
    }
    
    public function setUtenteMod($nome, $cognome, $username, $password, $email, $via, $CAP, $citta, $codice_attivazione, $stato, $foto )
    {
    	$this->nome=$nome;
    	$this->cognome=$cognome;
    	$this->password=$password;
    	$this->email=$email;
    	$this->via=$via;
    	$this->CAP=$CAP;
    	$this->citta=$citta;
    	$this->username=$username;
    	$this->codice_attivazione=$codice_attivazione;
    	$this->stato=$stato;
    	$this->foto=$foto;
    }
    
    
    
    /**
     * @access public
     */
    public function generaCodiceAttivazione() {
        $this->codice_attivazione=mt_rand();
    }

    /**
     * @access public
     * @param Entity.EPrenotazione aPrenotazione
     * @ParamType aPrenotazione Entity.EPrenotazione
     */
    public function addPrenotazione(EPrenotazione $Prenotazione) {
        $this->_prenotazioni[]=$Prenotazione;
    }

    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getPrenotazioni() {
        return $this->_prenotazioni;
    }
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }

    public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
    
}
?>