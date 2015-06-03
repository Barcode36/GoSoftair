<?php
/**
 * @access public
 * @package Entity
 */
class EPartita {
    public $IDpartita;
    public $autore;
    public $postiliberi;
    public $prezzo;
    public $data;
    public $descrizione;
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $arrayprenotazioni = array();

    /**
     * @access public
     * @param Entity.ECommento aParameter
     * @return boolean
     * @ParamType aParameter Entity.ECommento
     * @ReturnType boolean
     */
    public function addprenotazione(EPrenotazione $Prenotazione) {
        array_push($this->arrayprenotazioni, $Prenotazione);
    }

    
    
    /**
     * Restituisce un array di commenti relativi al libro
     *
     * @access public
     * @return array
     * @ReturnType array
     */
    public function getIDpartita(){
        return ($this->IDpartita);
    }

    public function getAutore() {
        return ($this->autore);
    }

    public function getprezzo() {
        return ($this->prezzo);
    }

    public function getData() {
        return ($this->data);
    }

    public function getDescrizione() {
        return ($this->descrizione);
    }

    public function getPostiLiberi(){
        return ($this->postiliberi);
    }

    public function setIDpartita(){
        $this->IDpartita=getAutore().mt_rand();
    }

    public function setAutore(EUtente $Utente){
        $this->autore=$Utente.getUsername();
    }

    public function setPostiLiberi(Integer $nrp){
        $this->postiliberi=$nrp;
    }

    public function setPrezzo(Integer $pr){
        $this->prezzo=$pr;
    }

    /*public function setData(){
                                            DA FARE CON LIBRERIA APPOSITA
    }
*/

    public function setDescrizione($des){
        $this->descrizione=$des;
    }



}
?>