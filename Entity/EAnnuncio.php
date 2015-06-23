<?php

/**
 *
 * Classe Annuncio che descrive l'entità Annuncio
 * @package Entity
 * @author Vincenzo Cavallo
 * @author Mattia Ciolli
 * @author Davide Giancola
 * 
 */
class EAnnuncio {
    public $idannuncio;
    public $descrizione;
	public $img=array();
	public $prezzo;
	public $scadenza;
	public $autore;
    
    /**
    * Costruttore di Annuncio
    *
    * @param string $descrizione
    * @param array $img
    * @param string $prezzo
    * @param EUtente $utente
    */
    public function __construct($descrizione,$img,$prezzo,EUtente $utente)
    {
        $this->setIDan( $utente);
        $this->setDescrizione($descrizione);
        $this->setIMG(array $img);
        $this->setPrezzo($prezzo);
        $this->setScadenza();
		$this->setAutore( $utente);
    }




    //METODI SET

    /**
     * Imposta $idannuncio
     *
     */  
    public function setIDan(EUtente $utente) {
            $this->idannuncio = $utente.getUsername().rand (1, 100);
    }


    /**
     * Imposta $descrizione nell'annuncio
     * @param string $descrizione
     *
     */  
    public function setDescrizione($descr){
            $this->descrizione = $descr;
    }


    /**
     * Inserisce le immagini dell'annuncio
     * @param array $img
     *
     */  
    public function setIMG(array $img)
    {
        $this->img=$img;
    }


    /**
     * Imposta $p come prezzo dell'annuncio
     * @param string $p
     *
     */  
    public function setPrezzo($p) {
            $this->prezzo = $p;
    }
    

     /**
     * Imposta $s come scadenza dell'annuncio. Scadenza fissa, un mese dall'inserimento
     *
     */  
  
    public function setScadenza() 
    {
			$d=date ("d/m/Y");
			$newdate = strtotime ( '+31 day' , strtotime ( $d ) ) ;
			$newdate = date ( 'Y-m-d' , $newdate ); 
            $this->scadenza=$newdate;
    }

	/**
     * Imposta il nome dell'autore
     *
     */  
    public function setAutore(EUtente $u) {
            $this->autore = $u.getUsername();
    }

    //METODI GET

    /**
     * 
     * @return string Stringa contenente l'id dell'annuncio.
     *
     */
    public function getIDan()
     {
        return $this->idannuncio;
     }
    

     /**
     * 
     * @return string Stringa contenente la decrizione
     *
     */
    public function getDescrizione()
     {
        return $this->descrizione;
     }
    

    /**
     * 
     * @return array Ritorna le immagini
     *
     */    
    public function getIMG()
    {
        return $this->img;
    }

    
    /**
     * 
     * @return string Stringa contenente il prezzo.
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }


     /**
     * 
     * @return date Restituisce la scadenza dell'annuncio.
     *
     */
    public function getScadenza()
    {
        return $this->scadenza;
    }
	
	 /**
     * 
     * @return string Restituisce l'username dell'autore.
     *
     */
    public function getAutore()
    {
        return $this->autore;
    }


    }
?>
