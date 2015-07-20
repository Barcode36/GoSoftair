<?php
/**
 * @access public
 * @package Entity
 */
class EPartita {
    public $titolo;
    public $autore;
    public $prezzo;
    public $descrizione;              
    public $categoria;
    public $indirizzo;
	public $data;
	public $ngiocatori;
	public $ndisponibili;
	public $IDpartita;
	public $immagine;
	public $attrezzatura;
	public $votata;
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_commento = array();
    

    public function setTitolo($titolo)
    {
    	$this->titolo=$titolo;
    }
    
    public function setAutore($autore)
    {
    	$this->autore=$autore;
    }
    
    //pare che scritti così i set funzionano
    public function setPrezzo($prezzo)
    {
    	$this->prezzo=$prezzo;
    }

    public function setDescrizione($descrizione)
    {
    	$this->descrizione=$descrizione;
    }
    
    public function setCategoria($cotegoria)
    {
    	$this->categoria=$categoria;
    }
    
    public function setIndirizzo($indirizzo)
    {
    	$this->indirizzo=$indirizzo;
    }
    
    public function setData($data)
    {
    	$this->data=$data;
    }
    
    public function setNgiocatori($ngiocatori)
    {
    	$this->ngiocatori=$ngiocatori;
    }
    
    public function setNdisponibili($ndisponibili)
    {
    	$this->ndisponibili=$ndisponibili;
    }
    
    public function setIDpartita($IDpartita)
    {
    	$this->IDpartita=$IDpartita;
    }
    
    public function setImmagine($immagine)
    {
    	$this->immagine=$immagine;
    }
    
    public function setAttrezzatura($attrezzatura)
    {
    	$this->attrezzatura=$attrezzatura;
    }
    
    public function setVotata($votata)
    {
    	$this->votata=$votata;
    }
    
    public function setCommento($commento)
    {
    	$this->_commento=$commento;
    }

    public function getPrezzo() {
    	return $this->prezzo;
    }
    
    public function getDescizione() {
    	return $this->descrizione;
    }
	
    public function getCategoria() {
    	return $this->categoria;
    }
    
    public function getIndirizzo() {
    	return $this->indirizzo;
    }
    
    public function getData() {
    	return $this->data;
    }
    
    public function getNgiocatori() {
    	return $this->ngiocatori;
    }
    
    public function getNdisponibili() {
    	return $this->ndisponibili;
    }
    
    public function getId() {
    	return $this->IDpartita;
    }
    
    
    public function getVotata() {
    	return $this->votata;
    }

    public function getImmagine() {
    	return $this->immagine;
    }
    
    public function getAttrezzatura() {
    	return $this->attrezzatura;
    }
    
    
    public function getTitolo() {
    	return $this->titolo;
    }
    
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
     * Restituisce la media dei voti per il partita
     *
     * @access public
     * @return float
     * @ReturnType float
     */
    public function getMediaVoti() {
        $somma=0;
        $voti=count($this->_commento);
        if ($voti>1) {
            foreach ($this->_commento as $commento) {
                $somma+=$commento->getVoto();
            }
            return $somma/$voti;
        }
        elseif (isset($this->_commento[0]->voto))
            return $this->_commento[0]->voto;
        else
            return false;
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