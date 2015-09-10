<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
	/**
	 * @var $nome Variabile contenente il nome dell'utente
	 * @AttributeType string
	 */
	private $nome;
	/**
	 * @var $cognome Variabile contenente il cognome dell'utente
	 * @AttributeType string
	 */
    private $cognome;
    /**
     * @var $username Variabile contenente l'username dell'utente
     * @AttributeType string
     */
    private $username;
    /**
     * @var $password Variabile contenente la password dell'utente
     * @AttributeType string
     */
    private $password;
    /**
     * @var $email Variabile contenente l'email dell'utente
     * @AttributeType string
     */
    private $email;
    /**
     * @var $via Variabile contenente la via di residenza dell'utente
     * @AttributeType string
     */
    private $via;
    /**
     * @var $CAP Variabile contenente il CAP di residenza dell'utente
     * @AttributeType string
     */
    private $CAP;
    /**
     * @var $citta Variabile contenente la citta di residenza dell'utente
     * @AttributeType string
     */
    private $citta;
    /**
     * @var $codice_attivazione Variabile contenente il codice di attivazione necessario per
     * la registrazione  dell'utente
     * @AttributeType string
     */
    private $codice_attivazione;
    /**
     * @var $stato Variabile contenente se l'utente ha completato la registrazione
     * @AttributeType string
     */
    private $stato='non_attivo';
    /**
     * @var $foto Variabile contenente la foto relativa all'utente
     */
    private $foto;
    /**
     * @var $punti Variabile contenente il punteggio cumulativo assegnato all'utente 
     * @AttributeType int
     */
	private $punti;
	
	/**
	 * @var $giocate Variabile contenente il numero di partire giocate dall'utente
	 * @AttributeType int
	 */
	private $giocate;
	
	/**
	 * @var $vittorie Variabile contenente il numero di partite vinte dall'utente
	 * @AttributeType int
	 */
	private $vittorie;
    
    /**
     * @AssociationType Entity.EPrenotazione
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    private $_prenotazioni = array();

    /**
     * restituisce un array contenente tutti gli attributi dell'oggetto
     * @access public
     * @return array Array associativo dove la chiave e il nome dell'attributo e il valore � il suo contenuto
     *
     */
    public function getAllArray() {
    	$dati=array('username'=> $this->username,
    				'password'=> $this->password,
    				'codice_attivazione'=> $this->codice_attivazione,
    				'stato'=> $this->stato,
    				'_prenotazioni'=> $this->_prenotazioni,
    				'nome'=> $this->nome, 
    				'cognome'=> $this->cognome, 
    				'foto'=> $this->foto,
    				'punti'=> $this->punti,
    				'giocate'=> $this->giocate,
    				'vittorie'=> $this->vittorie,
    				'email'=> $this->email,
    				'citta'=> $this->citta,
    				'via'=> $this->via,
    				'CAP'=> $this->CAP);
    	return $dati;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il nome dell'utente.
     *
     */
    public function getNome() {
    	return $this->nome;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il cognome dell'utente.
     *
     */
    public function getCognome() {
    	return $this->cognome;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'username dell'utente.
     *
     */
    public function getUsername() {
    	return $this->username;
    }
    
    /**
     * @access public
     * @return string Stringa contenente la password dell'utente.
     *
     */
    public function getPassword() {
    	return $this->password;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'email dell'utente.
     *
     */
    public function getEmail() {
    	return $this->email;
    }
    
    /**
     * @access public
     * @return int Intero contenente il punteggio raggiunto dall'utente.
     *
     */
    public function getPunti() {
    	return $this->punti;
    }
    
    /**
     * @access public
     * @return int Intero contenente il numero di partite giocate dall'utente.
     *
     */
    public function getGiocate() {
    	return $this->giocate;
    }
    
    /**
     * @access public
     * @return int Intero di vittorie dell'utente.
     *
     */
    public function getVittorie() {
    	return $this->vittorie;
    }
   
    /**
     * @access public
     * @return string Stringa contenente la via di residenza dell'utente.
     *
     */
    public function getVia() {
    	return $this->via;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il CAP di residenza dell'utente.
     *
     */
    public function getCAP() {
    	return $this->CAP;
    }
    
    /**
     * @access public
     * @return string Stringa contenente la citta di residenza dell'utente.
     *
     */
    public function getCitta() {
    	return $this->citta;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il codide di attivazione del preofilo dell'utente.
     *
     */
    public function getCodiceattivazione() {
    	return $this->codice_attivazione;
    }
    
    /**
     * @access public
     * @return string Stringa contenente se l'utente � attivo.
     *
     */
    public function getStato() {
    	return $this->stato;
    }
    
    /**
     * @access public
     * @return contenente la foto relativa all'utente.
     *
     */
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

    /**
     * Imposta i dati dell'utente presi dal modulo iniziale di registrazione.
     *
     * @access public
     * @param string $nome
     * @param string $cognome
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $via
     * @param string $CAP
     * @param string $citta

     */
    public function setDatiRegistrazione($nome, $cognome, $username, $password, $email, $via, $CAP, $citta)
    {
    	$this->nome=$nome;
    	$this->cognome=$cognome;
    	$this->password=$password;
    	$this->email=$email;
    	$this->via=$via;
    	$this->CAP=$CAP;
    	$this->citta=$citta;
    	$this->username=$username;
    }
    
    
    /**
     * Imposta i dati dell'utente.
     * La funzione viene utilizzata quando � necessario apportare un modifica al profilo dell'utente.
     *
     * @access public
     * @param string $nome
     * @param string $cognome
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $via
     * @param string $CAP
     * @param string $citta
     * @param string $codice_attivazione
     * @param string $stato
     * @param $foto
     */
    public function setUtenteMod($nome, $cognome, $username, $password, $email, $via, $CAP, $citta, $codice_attivazione, $stato )
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
    	
    }
    
    /**
     * Imposta $nome come il nome dell'utente
     * @access public
     * @param string $nome
     *
     */
    public function setNome($nome){
    	$this->nome=$nome;
    }
    
    /**
     * Imposta $cognome come  il cognome dell'utente
     * @access public
     * @param string $cognome
     *
     */
    public function setCognome($cognome){
    	$this->cognome=$cognome;
    }
    
    /**
     * Imposta $username come l'username dell'utente
     * @access public
     * @param string $username
     *
     */
    public function setUsername($username){
    	$this->username=$username;
    }
    
    /**
     * Imposta $password come la passoword dell'utente
     * @access public
     * @param string $password
     *
     */
    public function setPassword($password){
    	$this->password=$password;
    }
    
    /**
     * Imposta $email come l'email dell'utente
     * @access public
     * @param string $email
     *
     */
    public function setEmail($email){
    	$this->email=$email;
    }
    
    /**
     * Imposta $via come via di residenza dell'utente
     * @access public
     * @param string $cvia
     *
     */
    public function setVia($via){
    	$this->via=$via;
    }
    
    /**
     * Imposta $punti come  il punteggio assegnato all'utente
     * @access public
     * @param int $punti
     *
     */
    public function setPunti($punti){
    	$this->punti=$punti;
    }
    
    /**
     * Imposta $giocate con il numero di  giocate fatte dall'utente
     * @access public
     * @param int $giocate
     *
     */
    public function setGiocate($giocate){
    	$this->giocate=$giocate;
    }
    
    /**
     * Imposta $vittorie con il numero di vittorie fatte dall'utente
     * @access public
     * @param int $vittorie
     *
     */
    public function setVittorie($vittorie){
    	$this->vittorie=$vittorie;
    }
    
    /**
     * Imposta $CAP come  il cognome dell'utente
     * @access public
     * @param string $cognome
     *
     */
    public function setCAP($CAP){
    	$this->CAP=$CAP;
    }
    
    /**
     * Imposta $citta come la citta di residenza dell'utente
     * @access public
     * @param string $citta
     *
     */
    public function setCitta($citta){
    	$this->citta=$citta;
    }
    
    /**
     * Imposta $codice:attivazione come  il codice di attivazione dell'utente
     * @access public
     * @param string $codice_attivazione
     *
     */
    public function setCodiceattivazione($codice_attivazione){
    	$this->codice_attivazione=$codice_attivazione;
    }
    
    /**
     * Imposta $stato come lo stato dell'utente
     * @access public
     * @param string $stato
     *
     */
    public function setStato($stato){
    	$this->stato=$stato;
    }
    
    /**
     * Imposta $foto come la  foto associata all'utente
     * @access public
     * @param $foto
     *
     */
    public function setFoto($foto){
    	$this->foto=$foto;
    }
    
    /**
     * Imposta $prenotazione come la prenotazione dell'utente
     * @access public
     *
     */
    public function setPrenotazioni($prenotazioni){
    	$this->prenotazioni=$prenotazioni;
    }
    /**
     * Genera un codice di attivazione in modo random 
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