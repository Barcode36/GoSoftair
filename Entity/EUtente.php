<?php

/**
 *
 * Classe Utente che descrive l'entità Utente
 * @package Entity
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class EUtente {
    public $nome;
    public $cognome;
    public $username;
    public $password;
    public $email;
    public $prenotazioni = array();
	public $annunci = array();
    
    /**
    * Costruttore di Utente
    *
    * @param string $nome
    * @param string $cognome
    * @param string $username
    * @param string $password
    * @param string $email
    * @param array $prenotazioni
    */
    public function __construct($nome,$cognome,$username,$password,$email,$prenotazioni)
    {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setUsername($username);
        $this->setPass($password);
        $this->setEmail($email);
        $this->setPrenotazioni($prenotazioni);  //In teoria si aggiungono dopo
		$this->setAnnunci($annunci);			// la creazione dell'oggetto, è l'utente a crearli entrambi se vuole
    }




    //METODI SET

    /**
     * Setta $nome come nome dell'utente
     * @param string $nome
     *
     */  
    public function setNome($nome) {
            $this->nome = ucwords($nome);
    }


    /**
     * Setta $cognome come cognome dell'utente
     * @param string $cognome
     *
     */  
    public function setCognome($cognome){
            $this->cognome = ucwords($cognome);
    }


    /**
     * Setta $username come username dell'utente
     * @param string $username
     *
     */  
    public function setUsername($username)
    {
        $this->username=$username;
    }


    /**
     * Setta $password come password dell'utente
     * @param string $password
     *
     */  
    public function setPassword($password) {
            $this->password = $password;
    }
    

     /**
     * Setta $email come email associata all'utente
     * @param string $email
     *
     */  
  
    public function setEmail($email) 
    {
            $this->email=$email;
    }


     /**
     * Associa a $prenotazioni l'array contenuto in $prenotazioni
     * @param array $prenotazioni
     *
     */  
    public function setPrenotazioni(array $prenotazioni) {				//???????????????
        $this->prenotazioni = $prenotazioni;
    }

	 /**
     * Associa a $annunci l'array contenuto in $annunci
     * @param array $annunci
     *
     */  
    public function setAnnunci(array $annunci) {				//???????????????
        $this->annunci = $annunci;
    }



    //METODI GET

    /**
     * 
     * @return string Stringa contenente il nome dell'utente.
     *
     */
    public function getNome()
     {
        return $this->nome;
     }
    

     /**
     * 
     * @return string Stringa contenente il cognome dell'utente
     *
     */
    public function getCognome()
     {
        return $this->cognome;
     }
    

    /**
     * 
     * @return string Stringa contenente l'username dell'utente.
     *
     */    
    public function getUsername()
    {
        return $this->username;
    }

    
    /**
     * 
     * @return string Stringa contenente la password dell'utente.
     */
    public function getPassword()
    {
        return $this->password;
    }


     /**
     * 
     * @return string Stringa contenente l'email dell'utente.
     *
     */
    public function getEmail()
    {
        return $this->email;
    }


     /**
     * 
     * @return array Array contenente gli annunci inseriti dall'utente
     *
     */    
    public function getAnnunci() {
        return $this->annunci;
    }


     /**
     * 
     * @return array Array contenente le prenotazioni dell'utente
     *
     */    
    public function getPrenotazioni() {
        return $this->prenotazioni;
    }



	 /**
     * Crea un annuncio
     * @param EUtente $u
     *
     */  
    public function CreaAnnuncio(EUtente $u) {
        $a=new EAnnuncio($descr,$img,$prez,$u);
		$this.addAnnuncio($a);

    }

     /**
     * Aggiunge un annuncio
     * @param EAnnuncio $annuncio
     *
     */  
    public function addAnnuncio(EAnnuncio $annuncio) {
        $this->$annunci[] = $annuncio;

    }

 /**
     * Si prenota ad una partita
     * @param EPartita $p
     *
     */  
    public function Prenotati(EPartita $p) {
        $p=new EPrenotazione($data,$confermato=false,EUtente $Utente, EPartita $p)
		$this->addPrenotazione($p);
    }




     /**
     * Aggiunge una prenotazione all'array $prenotazioni
     * @param EPrenotazione $prenotazione
     *
     */  
    public function addPrenotazione(EPrenotazione $prenotazione) {
        $this->$prenotazioni[] = $prenotazione;

    }
    




















/**
 * DA AGGIUNGERE:
 * TIPI DI UTENTE: inserire variabile per gestire il tipo di utente tra admin, registrato e non registrato e fare metodi
 * inserire controlli nelle funzioni set (vedere espressioni regolari)
 * codice di attivazione???
 * ...
 *
 *
 */















//CODICE FATTO DA QUALCUNO DI VOI DA FINIRE???:
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    /*public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else                                        NON SO SE CE NE SIA EFFETTIVAMENTE BISOGNO
            return false;
    }

    public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
    */
    














  }
?>