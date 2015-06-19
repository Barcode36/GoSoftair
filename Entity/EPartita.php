<?php
/**
 *
 * Classe EPartita che descrive l'entità Partita
 * @package Entity
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class EPartita {
    public $idpartita;
    public $postiliberi;
    public $prezzo;
    public $data;
    public $descrizione;
    public $prenotazionipartita = array();



    /**
    * Costruttore di Partita
    *
    * @param string $idpartita
    * @param int $postiliberi
    * @param float $prezzo
    * @param string $data
    * @param string $descrizione
    * @param array $prenotazionipartita
    */
    public function __construct($idpartita,$postiliberi,$prezzo,$data,$descrizione,$prenotazionipartita)
    {
        $this->setIdpartita($nome);
        $this->setPostiliberi($cognome);
        $this->setPrezzo($username);
        $this->setData($password);
        $this->setDescrizione($email);
        $this->setPrenotazionipartita($prenotazionipartita);
    }





//METODI SET

    /**
     * Setta $Idpartita come idpartita della partita
     * @param string $Idpartita
     *
     */  
    public function setNome($idpartita) {
            $this->idpartita = $idpartita;
    }


    /**
     * Setta $cognome come cognome dell'utente
     * @param string $cognome
     *
     */  
    public function setPostiliberi(Integer $postiliberi){
            $this->postiliberi = $postiliberi;
    }


    /**
     * Setta $prezzo come prezzo della partita
     * @param string $username
     *
     */  
    public function setPrezzo($prezzo)
    {
        $this->prezzo=$prezzo;
    }


     /**
     * Setta $data come data della partita
     * @param $data string
     */
    public function setData($data) {
        $anno=substr($data, 6);
        $mese=substr($data, 3, 2);
        $giorno=substr($data, 0, 2);
        $this->data="$anno-$mese-$giorno";
    }

     /**
     * Setta $email come email associata all'utente
     * @param string $email
     *
     */  
  
    public function SetDescrizione($descrizione) 
    {
            $this->descrizione=$descrizione;
    }


     /**
     * Associa a $prenotazioni l'array contenuto in $prenotazioni
     * @param array $prenotazioni
     *
     */  
    public function setPrenotazionipartita(array $prenotazionipartita) {
        $this->prenotazionipartita = $prenotazionipartita;
    }



//METODI GET

    /**
     * 
     * @return string Stringa contenente l'idpartita della partita.
     *
     */
    public function getIdpartita()
     {
        return $this->idpartita;
     }
    

     /**
     * 
     * @return int contenente il numero dei posti liberi dellla partita
     *
     */
    public function getPostiliberi()
     {
        return $this->postiliberi;
     }
    

    /**
     * 
     * @return int contenente il prezzo della partita
     *
     */    
    public function getPrezzo()
    {
        return $this->prezzo;
    }

  /** restituisce la data della partita
     * @return $data string
     */
    public function getData() {
        return $this->data;
    }

     /**
     * 
     * @return string Stringa contenente la descrizione della partita
     *
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

     /**
     * 
     * @return array Array contenente le prenotazioni alla partita
     *
     */    
    public function getPrenotazionipartita() {
        return $this->prenotazionipartita;
    }









     /**
     * Aggiunge una prenotazione all'array $prenotazionipartita
     * @param EPrenotazione $prenotazione
     *
     */  
    public function addPrenotazione(EPrenotazione $prenotazione) {
        $this->$prenotazionipartita[] = $prenotazione;
    }
    



  



}
?>