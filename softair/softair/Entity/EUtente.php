<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
    public $nome;
    public $cognome;
    public $username;
    public $password;
    public $email;
    public $via;
    public $CAP;
    public $citta;
    public $codice_attivazione;
    public $stato='non_attivo';
    /**
     * @AssociationType Entity.EPrenotazione
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_prenotazioni = array();
    /**
     * @access public
     * @return float
     * @ReturnType float
     */

    /**
     * @access public
     */
    public function generaCodiceAttivazione() {
        $this->codice_attivazione=mt_rand();
    }

    /**
     * @access public
     * @param Entity.EPrenotazione aPrenotazione
     * @ParamType aPrenotazione Entity.EPrenotazione
     */
    public function addPrenotazione(EPrenotazione $Prenotazione) {
        $this->_prenotazioni[]=$Prenotazione;
    }

    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getPrenotazioni() {
        return $this->_prenotazioni;
    }
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }

    public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
}
?>