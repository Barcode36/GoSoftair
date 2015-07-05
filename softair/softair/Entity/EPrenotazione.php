<?php

/**
 * @access public
 * @package Entity
 */
class EPrenotazione {
    /**
     * @AttributeType int
     */
    public $id;
    /**
     * @AttributeType Date
     */
    public $data;
    /**
     * @AttributeType boolean
     */
    public $pagato=false;
    /**
     * @AttributeType boolean
     */
    public $confermato=false;
    /**
     * @AssociationType Entity.EUtente
     * @AssociationMultiplicity 1
     */
    public $_utente;
    /**
     * 
     * @AssociationMultiplicity 1..*
     * @AssociationKind Aggregation
     */
    public $_item = array();
    /**
     * @AssociationType Entity.ECartaCredito
     * @AssociationMultiplicity 1
     */
    public $_cartacredito;

    /**
     * @access public
     * @return float
     */
    public function getPrezzoTotale() {
        $prezzo=0;
        if (count($this->_item)>0) {
            foreach($this->_item as $item) {
                $libro=$item->getLibro();
                $prezzo += $libro->prezzo*$item->quantita;
            }
        }
        return $prezzo;
    }

    /**
     * @access public
     * @param $pagato boolean
     */
    public function setPagato($pagato) {
        $this->pagato=$pagato;
    }

    /**
     * @access public
     * @param $confermato boolean
     */
    public function setConfermato($confermato) {
        $this->confermato=$confermato;
    }

    /**
     * @access public
     * @return array()
     */
    public function getItems() {
        return $this->_item;
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
    /**
     * @access public
     * @param $cartaCredito ECartaCredito
     */
    public function setCartaCredito(ECartaCredito $cartaCredito) {
        $this->_cartacredito=$cartaCredito;
    }
    /**
     * @access public
     * @param $utente EUtente
     */
    public function setUtente(EUtente $utente) {
        $this->_utente=$utente;
    }
    /**
     * rimuovo l'item nella posizione $pos dell'array
     *
     * @param int $pos
     */
    public function removeItem($pos) {
        unset($this->_item[$pos]);
        $this->_item=array_values($this->_item);
    }
    /** restituisce l'utente relativo all'prenotazione
     * @return EUtente
     */
    public function getUtente() {
        return $this->_utente;
    }

}
?>