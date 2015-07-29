<?php
/**
 * @access public
 * @package Entity
 */
class EPartita {
	/**
	 * @var $titolo Variabile contenente il titolo della partita
	 * @AttributeType string
	 */
	private $titolo;
	/**
	 * @var $autore Variabile contenente l'autore della partita
	 * @AttributeType string
	 */
    private $autore;
    /**
     * @var $prezzo Variabile contenente il prezzo della partita
     * @AttributeType int
     */
   private $prezzo;
    /**
     * @var $descrizione Variabile contenente la descrizione della partita
     * @AttributeType string
     */
    private $descrizione;
    /**
     * @var $categoria Variabile la categoria della partita
     * @AttributeType string
     */
    private $categoria;
    /**
     * @var $indirizzo Variabile contenente l'indirizzo della partita
     * @AttributeType string
     */
    private $indirizzo;
	/**
	 * @var $data Variabile contenente la data di svolgimento della partita
	 */
	private $data;
	/**
	 * @var $ora Variabile contenente l'ora della partita
	 * @AttributeType string
	 */
	private $ora;
	/**
	 * @var $ngiocatori Variabile contenente il numero massimo di giocatori della partita
	 * @AttributeType int
	 */
	private $ngiocatori;
	/**
	 * @var $ndisponibili Variabile contenente il numero di posti ancora disponibili nella partita
	 * @AttributeType int
	 */
	private $ndisponibili;
	/**
	 * @var $IDpartita Variabile contenente l'identificativo della partita
	 * @AttributeType string
	 */
	private $IDpartita;
	/**
	 * @var $titolo Variabile contenente l'immagine associata alla partita
	 * @AttributeType array
	 */
	private $immagine;
	/**
	 * @var $attrezzatura Variabile che specifica se è disponibile attrezzatuta
	 * @AttributeType string
	 */
	private $attrezzatura;
	/**
	 * @var $titolo Variabile che specifica se è stato assegnato un punteggio ai giocatori
	 * che hanno partecipato alla partita 
	 * @AttributeType string
	 */
	private $votata;
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    private $_commento = array();
    
    /**
     * Imposta $titolo come titolo della partita 
     * @access public
     * @param string $titolo
     *
     */
    public function setTitolo($titolo)
    {
    	$this->titolo=$titolo;
    }
    
    /**
     * Imposta $autore come utente autore della partita
     * @access public
     * @param string $autore
     *
     */
    public function setAutore($autore)
    {
    	$this->autore=$autore;
    }
    
    /**
     * Imposta $prezzo come prezzo per la partita
     * @access public
     * @param int $prezzo
     *
     */
    public function setPrezzo($prezzo)
    {
    	$this->prezzo=$prezzo;
    }

    /**
     * Imposta $descrizione come descizione della partita
     * @access public
     * @param string $descrizione
     *
     */
    public function setDescrizione($descrizione)
    {
    	$this->descrizione=$descrizione;
    }
    
    /**
     * Imposta $categoria come categoria della partita
     * @access public
     * @param string $categoria
     *
     */
    public function setCategoria($categoria)
    {
    	$this->categoria=$categoria;
    }
    
    /**
     * Imposta $indirizzo come indirizzo della partita
     * @access public
     * @param string $indirizzo
     *
     */
    public function setIndirizzo($indirizzo)
    {
    	$this->indirizzo=$indirizzo;
    }
    
    /**
     * Imposta $data come data di svolgimento della partita
     * @access public
     */
    public function setData($data)
    {
    	$this->data=$data;
    }
    
    /**
     * Imposta $ora come ora di svolgimento della partita
     * @access public
     */
    public function setOra($ora)
    {
    	$this->ora=$ora;
    }
    
    /**
     * Imposta $ngocatori come numero di giocatori massimo per la partita
     * @access public
     * @param int $ngiocatori
     *
     */
    public function setNgiocatori($ngiocatori)
    {
    	$this->ngiocatori=$ngiocatori;
    }
    
    /**
     * Imposta $ndisponibili come  numero di posti ancora disponibili per la partita
     * @access public
     * @param int $ndisponibili
     *
     */
    public function setNdisponibili($ndisponibili)
    {
    	$this->ndisponibili=$ndisponibili;
    }
    
    /**
     * Imposta $Id come identificativo della partita
     * @access public
     * @param string $IDpartita
     *
     */
    public function setIDpartita($IDpartita)
    {
    	$this->IDpartita=$IDpartita;
    }
    
    /**
     * Imposta $immagine come immagine relatica alla partita
     * @access public
     * @param array $immagine
     *
     */
    public function setImmagine($immagine)
    {
    	$this->immagine=$immagine;
    }
    
    /**
     * Imposta $attrezzatura come attrezzatura della partita
     * @access public
     * @param string $attrezzatura
     *
     */
    public function setAttrezzatura($attrezzatura)
    {
    	$this->attrezzatura=$attrezzatura;
    }
    
    /**
     * Imposta $votata come votata della partita
     * @access public
     * @param string $votata
     *
     */
    public function setVotata($votata)
    {
    	$this->votata=$votata;
    }
    
    /**
     * Imposta $commento come commento alla partita
     * @access public
     * @param string $commento
     *
     */
    public function setCommento($commento)
    {
    	$this->_commento=$commento;
    }

    /**
     * restituisce un array contenente tutti gli attributi dell'oggetto
     * @access public
     * @return array Array associativo dove la chiave e il nome dell'attributo e il valore è il suo contenuto
     *
     */
    public function getAllArray() {
    	$dati=array('titolo'=> $this->titolo,
    			'autore'=> $this->autore,
    			'prezzo'=> $this->prezzo,
    			'descrizione'=> $this->descrizione,
    			'categoria'=> $this->categoria,
    			'indirizzo'=> $this->indirizzo,
    			'data'=> $this->data,
    			'ora'=> $this->ora,
    			'ngiocatori'=> $this->ngiocatori,
    			'ndisponibili'=> $this->ndisponibili,
    			'IDpartita'=> $this->IDpartita,
    			'immagine'=> $this->immagine,
    			'attrezzatura'=> $this->attrezzatura,
    			'votata'=> $this->votata,
    			'_commento'=> $this->_commento);
    	return $dati;
    }
    
    /**
     * @access public
     * @return int Intero contenente il prezzo della partita.
     *
     */
    public function getPrezzo() {
    	return $this->prezzo;
    }
    
    /**
     * @access public
     * @return string Stringa contenente la descrizione della partita.
     *
     */
    public function getDescizione() {
    	return $this->descrizione;
    }
	
    /**
     * @access public
     * @return string Stringa contenente la categoria della partita.
     *
     */
    public function getCategoria() {
    	return $this->categoria;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'indirizzo della partita.
     *
     */
    public function getIndirizzo() {
    	return $this->indirizzo;
    }
    
    /**
     * @access public
     * @return  contenente la data di svolgimento della partita.
     *
     */
    public function getData() {
    	return $this->data;
    }
    
    /**
     * @access public
     * @return  contenente l'ora di svolgimento della partita.
     *
     */
    public function getOra() {
    	return $this->ora;
    }
    
    /**
     * @access public
     * @return int Intero contenente il numero di giocatir massimo della partita.
     *
     */
    public function getNgiocatori() {
    	return $this->ngiocatori;
    }
    
    /**
     * @access public
     * @return int Intero contenente il numero di posti disponibil per la partita.
     *
     */
    public function getNdisponibili() {
    	return $this->ndisponibili;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'identificativo della partita.
     *
     */
    public function getId() {
    	return $this->IDpartita;
    }
    
    /**
     * @access public
     * @return string Stringa contenente se la partita è stata votata.
     *
     */
    public function getVotata() {
    	return $this->votata;
    }

    /**
     * @access public
     * @return array contenente l'immagine associata alla partita.
     *
     */
    public function getImmagine() {
    	return $this->immagine;
    }
    
    /**
     * @access public
     * @return string Stringa contenente se la partita fornnisce attrezzatura.
     *
     */
    public function getAttrezzatura() {
    	return $this->attrezzatura;
    }
    
    /**
     * @access public
     * @return string Stringa contenente il titolo della partita.
     *
     */
    public function getTitolo() {
    	return $this->titolo;
    }
    
    /**
     * @access public
     * @return string Stringa contenente l'autore della partita.
     *
     */
    public function getAutore() {
    	return $this->autore;
    }
    
    /**
     * @access public
     * @param Entity.ECommento aParameter
     * @return boolean
     * @ParamType aParameter Entity.ECommento
     * @ReturnType boolean
     */
    public function addCommento(ECommento $commento) {
        array_push($this->_commento, $commento);
    }


    /**
     * Restituisce un array di commenti relativi alla partita
     *
     * @access public
     * @return array
     * @ReturnType array
     */
    public function getCommenti() {
        return ($this->_commento);
    }
}
?>