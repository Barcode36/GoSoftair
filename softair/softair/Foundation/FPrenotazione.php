<?php
/**
 * @access public
 * @package Foundation
 */
class FPrenotazione extends Fdb{
    public function __construct() {
        $this->_table='prenotazione';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EPrenotazione';
        USingleton::getInstance('Fdb');
    }
    public function store(EPrenotazione & $prenotazione){
        $FCartaCredito=new FCartaCredito();
        $FCartaCredito->store($prenotazione->_cartacredito);
        $prenotazione->cartaCreditoNumero=$prenotazione->_cartacredito->numero;
        $prenotazione->utenteusername=$prenotazione->_utente->username;
        $FPrenotazioneItem=new FPrenotazioneItem();
        $id = parent::store($prenotazione);
        foreach ($prenotazione->_item as &$item){
            $item->prenotazioneID=$id;
            $FPrenotazioneItem->store($item);
        }
        $prenotazione->id=$id;
    }
    public function load($key){
        $prenotazione=parent::load($key);
        $FUtente=new FUtente();
        $utente=$FUtente->load($prenotazione->utenteusername);
        $prenotazione->setUtente($utente);
        $Fcarta=new FCartaCredito();
        $carta=$Fcarta->load($prenotazione->cartaCreditoNumero);
        $prenotazione->setCartaCredito($carta);
        $id = parent::store($prenotazione);
        $prenotazione->id=$id;
        return $prenotazione;
    }
}

?>
