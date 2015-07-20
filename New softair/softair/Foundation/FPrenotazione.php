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
    
    /*public function store(EPrenotazione & $prenotazione){
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
    }*/
    
   /* public function load($key){
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
    }*/
    
	//cancella tutte le prenotazioni relative a una partita o un utente passandogli l'array di prenotazioni relative
    public function deleteRel($prenotazioni) {
    			$i=0;
    			while ($i<count($prenotazioni)) {
    				$this->delete($prenotazioni[$i]);
    				$i++;
    			}
    			print 'okpren';
    }

    
    
    public function loadall() {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table;
    	$this->query($query);
    	return $this->getObjectArray();
    }    
    
    
    public function loadfromuser($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE utenteusername = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    public function loadfrompartita($key) {
    	$query='SELECT * ' .
    			'FROM `'.$this->_table.'` ' .
    			'WHERE partitaID = \''.$key.'\'';
    	$this->query($query);
    	return $this->getObjectArray();
    }
    
    
}

?>
