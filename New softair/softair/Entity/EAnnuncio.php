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
    
    
    public function setAnnuncioMod($titolo, $prezzo, $descrizione, $telefono, $username, $IDannuncio ){
    	$this->titolo = $titolo;
    	$this->prezzo = $prezzo;
    	$this->descrizione = $descrizione;
    	$this->telefono = $telefono;
    	$this->autoreusername = $username;
    	$this->IDannuncio = $IDannuncio;
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
    public function setIMG($img)
    {
    	$this->immagine=$img;
    }
    /**
     * Imposta $p come prezzo dell'annuncio
     * @param string $p
     *
     */
    public function setPrezzo($p) {
    	$this->prezzo = $p;
    }
    

    //METODI GET
    /**
     *
     * @return string Stringa contenente l'id dell'annuncio.
     *
     */
    public function getIDan()
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
     * @return array Ritorna le immagini
     *
     */
    public function getIMG()
    {
    	return $this->immagine;
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
     * @return string Restituisce l'username dell'autore.
     *
     */
    public function getAutore()
    {
    	return $this->autoreusername;
    }
}
?>