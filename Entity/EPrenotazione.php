<?php

/**
 * @access public
 * @package Entity
 */
class EPrenotazione {
    /**
     * @AttributeType int
     */
    public $idpartita;
    /**
     * @AttributeType Date
     */
    public $data;
    /**
     * @AttributeType boolean
     */
    public $confermato=false;
    /**
     * @AssociationType Entity.EUtente
     * @AssociationMultiplicity 1
     */
    public $utente;
    
   /**
    * Costruttore di Prenotazione
    *
    * @param string $nome
    * @param string $cognome
    * @param string $username
    * @param string $password
    * @param string $email
    *
    */
    public function __construct($idpartita,$data,$confermato,$utente)
    {
        $this->setNome($idpartita);
        $this->setCognome($cognome);
        $this->setUsername($username);
        $this->setPass($password);
        $this->setEmail($email);
    }


    /**
     * @access public
     * @param EPartita item
     */
    public function setidpartita(EPartita $item) {
        $idpartita=$item->getIDpartita();
    }

    /**
     * @access public
     * @param $confermato boolean
     */
    public function setconfermato($confermato) {
        $this->confermato=$confermato;
    }

    /**
     * @access public
     * @param $data string
     */
    public function setdata($data) {
        $anno=substr($data, 6);
        $mese=substr($data, 3, 2);
        $giorno=substr($data, 0, 2);
        $this->data="$anno-$mese-$giorno";
    }

    /**
     * @access public
     * @param $utente EUtente
     */
    public function setutente(EUtente $utente) {
        $this->utente=$utente;
    }
    
    /** restituisce l'utente relativo all'ordine
     * @return EUtente
     */
    public function getutente() {
        return $this->utente;
    }
    
     /** restituisce il booleano confermato
     * @return $confermato boolean
     */
    public function getconfermato() {
        return $this->confermato;
    }

     /** restituisce l'id partita
     * @param EPartita item
     */
    public function getidpartita() {
        return $this->getidpartita();
    }
    
}
?>