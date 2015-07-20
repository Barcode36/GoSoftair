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

    public function getNome() {
    	return $this->nome;
    }
    
    public function getCognome() {
    	return $this->cognome;
    }
    
    public function getUsername() {
    	return $this->username;
    }
    
    public function getPassword() {
    	return $this->password;
    }
    
    public function getEmail() {
    	return $this->email;
    }
    
    public function getPunti() {
    	return $this->punti;
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
    
    public function getCodiceattivazione() {
    	return $this->codice_attivazione;
    }
    
    public function getStato() {
    	return $this->stato;
    }
    
    public function getFoto() {
    	return $this->foto;
    }
    
    
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getPrenotazioni() {
    	return $this->_prenotazioni;
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
    
    
    public function setNome($nome){
    	$this->nome=$nome;
    }
    
    public function setCognome($cognome){
    	$this->cognome=$cognome;
    }
    
    public function setUsername($username){
    	$this->username=$username;
    }
    
    public function setPassword($password){
    	$this->password=$password;
    }
    
    public function setEmail($email){
    	$this->email=$email;
    }
    
    public function setVia($via){
    	$this->via=$via;
    }
    
    public function setPunti($punti){
    	$this->punti=$punti;
    }
    
    public function setCAP($CAP){
    	$this->CAP=$CAP;
    }
    
    public function setCitta($citta){
    	$this->citta=$citta;
    }
    
    public function setCodiceattivazione($codice_attivazione){
    	$this->codice_attivazione=$codice_attivazione;
    }
    
    public function setStato($stato){
    	$this->stato=$stato;
    }
    
    public function setFoto($foto){
    	$this->foto=$foto;
    }
    
    public function setPrenotazioni($prenotazioni){
    	$this->prenotazioni=$prenotazioni;
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
    public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }

    
}
?>