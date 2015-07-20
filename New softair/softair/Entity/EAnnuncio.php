<?php
/**
 * @access public
 * @package Entity
 */
class EAnnuncio {
    public $IDannuncio;
    public $descrizione;
    public $prezzo;
    public $autoreusername;
    public $telefono;
    public $immagine;
    public $titolo;
    public $data;
    
    
    public function setAnnuncioMod($titolo, $prezzo, $descrizione, $telefono, $username, $IDannuncio, $data ){
    	$this->titolo = $titolo;
    	$this->prezzo = $prezzo;
    	$this->descrizione = $descrizione;
    	$this->telefono = $telefono;
    	$this->autoreusername = $username;
    	$this->IDannuncio = $IDannuncio;
    	$this->data = $data;
    }
    
    
    public function setIDannuncio($IDannuncio){
    	$this->IDannuncio = $IDannuncio;
    }
    
    /**
     * Imposta $descrizione nell'annuncio
     * @param string $descrizione
     *
     */
    public function setDescrizione($descrizione){
    	$this->descrizione = $descrizione;
    }
    /**
     * Imposta $prezzo come prezzo dell'annuncio
     * @param string $prezzo
     *
     */
    public function setPrezzo($prezzo) {
    	$this->prezzo = $prezzo;
    }
    
    public function setAutoreusername($autoreusername) {
    	$this->autoreusername = $autoreusername;
    }
    
    public function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }
    /**
     * Inserisce le immagini dell'annuncio
     * @param array $img
     *
     */
    public function setImmagine($immagine)
    {
    	$this->immagine=$immagine;
    }

    public function setTitolo($titolo) {
    	$this->titolo= $titolo;
    }
    
    public function setData($data) {
    	$this->data= $data;
    }
    

    //METODI GET

    /**
     *
     * @return string Stringa contenente l'id dell'annuncio.
     *
     */
    public function getIDannuncio()
    {
    	return $this->IDannuncio;
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
     * @return string Stringa contenente il prezzo.
     */
    public function getPrezzo()
    {
    	return $this->prezzo;
    }
	
    /*
    * @return string Restituisce l'username dell'autore.
    *
    */
    public function getAutoreusername()
    {
    	return $this->autoreusername;
    }
    
    public function getTelefono()
    {
    	return $this->telefono;
    }
    
    /**
     *
     * @return array Ritorna le immagini
     *
     */
    public function getImmagine()
    {
    	return $this->immagine;
    }
    
    public function getTitolo()
    {
    	return $this->titolo;
    }
    
    public function getData()
    {
    	return $this->data;
    }

    
    

}
?>