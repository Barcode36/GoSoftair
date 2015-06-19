<?php

/**
 *
 * Classe Prenotazione che descrive l'entità Prenotazione
 * @package Entity
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class EPrenotazione {
    public $idprenotazione;
    public $data;
    public $confermato;
    public $nicknameutente;
    public $idpartita;

   /**
    * Costruttore di Prenotazione
    *
    * @param string $idpartita
    * @param string $data
    * @param string $confermato
    *
    */
    public function __construct($idprenotazione,$data,$confermato=false,EUtente $Utente, EPartita $Partita)
    {
        $this->setIdprenotazione($idprenotazione);
        $this->setData($data);
        $this->nicknameutente=$Utente.getUsername();
        $this->idpartita=$Partita.getIdpartita();
    }


    //METODI SET


    /**
     * Setta $idpartita come id della prenotazione
     * @param string $id
     */
    public function setIdprenotazione($id) {
        $this->idprenotazione=$id;
    }

    /**
    * Setta $confermato
     * @access public
     * @param $confermato boolean
     */
    public function setConfermato($confermato) {
        $this->confermato=$confermato;
    }

    /**
     * @access public
     * @param $data string
     */
    public function setData($data) {
        $anno=substr($data, 6);
        $mese=substr($data, 3, 2);
        $giorno=substr($data, 0, 2);
        $this->data="$anno-$mese-$giorno";
    }

    


    //METODI GET

    
     /** restituisce il booleano confermato
     * @return $confermato boolean
     */
    public function getConfermato() {
        return $this->confermato;
    }

    /** restituisce la data 
     * @return $data string
     */
    public function getData() {
        return $this->data;
    }


     /** restituisce l'id partita
     * @return $idpartita string
     */
    public function getIdprenotazione() {
        return $this->idprenotazione;
    }

    /** restituisce nicknameutente
     * @return $nicknameutente string
     */
    public function getNicknameutente() {
        return $this->nicknameutente;
    }

     /** restituisce l'id partita a cui ci si è prenotato
     * @return $idpartita string
     */
    public function getIdpartita() {
        return $this->idpartita;
    }


    
}
?>