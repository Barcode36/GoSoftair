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
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_commento = array();
    
    
    //pare che scritti cos� i set funzionano
    public function setPrezzo($prezzo)
    {
    	$this->prezzo=$prezzo;
    }
    
    
    public function setNdisponibili($ndisponibili)
    {
    	$this->ndisponibili=$ndisponibili;
    }
    
    public function getNdisponibili() {
    	return $this->ndisponibili;
    }
    
    
    public function getData() {
    	return $this->data;
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
                $somma+=$commento->voto;
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