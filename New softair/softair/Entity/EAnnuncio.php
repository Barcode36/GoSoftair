<?php
/**
 * @access public
 * @package Entity
 */
class EAnnuncio {
	/**
	 * @var $IDannuncio Variabile contenente l'identificativo dell'annuncio
	 * @AttributeType string
	 */
	public $IDannuncio;
	/**
	 * @var descrizione Variabile contenente la descrizione dell'annuncio
	 * @AttributeType string
	 */
	public $descrizione;
	/**
	 * @var $prezzo Variabile contenente il prezzo relativo all'annuncio
	 * @AttributeType int
	 */
	public $prezzo;
	/**
	 * @var $autoreusername Variabile contenente l'autore dell'annuncio
	 * @AttributeType string
	 */
    public $autoreusername;
    /**
     * @var $telefono Variabile contenente il numero di telefono da chiamare per l'annuncio
     * @AttributeType int
     */
    public $telefono;
    /**
     * @var $immagine Variabile contenente l'immagine associata all'annuncio
     * @AttributeType array
     */    
    public $immagine;
    /**
     * @var $titolo  Variabile contenente il titolo dato all'annuncio
     * @AttributeType string
     */
    public $titolo;
    /**
     * @var $data  Variabile contenente la data di inserimento dell'annuncio
     */
    public $data;
    
    /**
     * Imposta i dati dell'annuncio.
     * La funzione viene utilizzata quando è necessario apportare un modifica all'annuncio insieme 
     * alla funzione setImmagine.
     * 
     * @param string $titolo
     * @param int $prezzo
     * @param string $descrizione
     * @param int $telefono
     * @param string $username
     * @param string $IDannuncio
     * @param $data
     */
    public function setAnnuncioMod($titolo, $prezzo, $descrizione, $telefono, $username, $IDannuncio, $data ){
    	$this->titolo = $titolo;
    	$this->prezzo = $prezzo;
    	$this->descrizione = $descrizione;
    	$this->telefono = $telefono;
    	$this->autoreusername = $username;
    	$this->IDannuncio = $IDannuncio;
    	$this->data = $data;
    }
    
    /**
     * Imposta $IDannuncio come  l'identificatico dell'annuncio
     * @access public
     * @param string $IDannuncio
     *
     */
    public function setIDannuncio($IDannuncio){
    	$this->IDannuncio = $IDannuncio;
    }
    
    /**
     * Imposta $descrzione come la descrizione dell'annuncio
     * @access public
     * @param string $descrizione
     *
     */
    public function setDescrizione($descrizione){
    	$this->descrizione = $descrizione;
    }
    
    /**
     * Imposta $prezzo come prezzo dell'annuncio
     * @access public
     * @param int $prezzo
     *
     */
    public function setPrezzo($prezzo) {
    	$this->prezzo = $prezzo;
    }
    
    /**
     * Imposta $autoreusername come autore dell'annuncio
     * @access public
     * @param string $autoreusername
     *
     */
    public function setAutoreusername($autoreusername) {
    	$this->autoreusername = $autoreusername;
    }
    
    /**
     * Imposta $telefono come numero di telefono di riferimento per l'annuncio
     * @access public
     * @param string $telefono
     *
     */
    public function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }
   
    /**
     * Imposta $immagine come immagine dell'annuncio
     * @access public
     * @param array $immagine
     *
     */
    public function setImmagine($immagine)
    {
    	$this->immagine=$immagine;
    }

    /**
     * Imposta $titolo come titolo dell'annuncio
     * @access public
     * @param string $titolo
     *
     */
    public function setTitolo($titolo) {
    	$this->titolo= $titolo;
    }
    
    /**
     * Imposta $data come data di inserimento dell'annuncio
     * @access public
     * @param $data
     *
     */
    public function setData($data) {
    	$this->data= $data;
    }
    
    
    

    /**
     * @access public
     * @return string Stringa contenente l'id dell'annuncio.
     *
     */
    public function getIDannuncio()
    {
    	return $this->IDannuncio;
    }
    
    /**
     * @access public
     * @return string Stringa contenente la decrizione dell'annuncio.
     * 
     */
    public function getDescrizione()
    {
    	return $this->descrizione;
    }
    
    /**
     * @access public
     * @return int Intero contenente il prezzo relativo all'annuncio.
     * 
     */
    public function getPrezzo()
    {
    	return $this->prezzo;
    }
	
   /**
    * @access public
    * @return string Restituisce l'username dell'autore.
    *
    */
    public function getAutoreusername()
    {
    	return $this->autoreusername;
    }
    
    /**
     * @access public
     * @return int Intero contenente il numero di telefono relativo all'annuncio.
     * 
     */
    public function getTelefono()
    {
    	return $this->telefono;
    }
    
    /**
     * @access public
     * @return array Ritorna l'immagine
     *
     */
    public function getImmagine()
    {
    	return $this->immagine;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il titolo dell'annuncio.
     * 
     */
    public function getTitolo()
    {
    	return $this->titolo;
    }
    
    /**
     * @access public
     * @return  contenente la data di inserimento delll'annuncio.
     * 
     */
    public function getData()
    {
    	return $this->data;
    }

    
    

}
?>