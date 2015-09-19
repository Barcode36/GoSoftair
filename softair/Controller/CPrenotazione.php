<?php
/**
 * Descrizione di CAnnunci
 * La classe permette il salvataggio di una prenotazione.
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CPrenotazione {
	
	/**
	 * La funzione viene richiamata quando l'utente conferma di volersi prenotare
	 * a una partita. La funzione aggiorna il numero di posti liberi nella partita.
	 * @access public
	 * @return mixed
	 */
    public function salvaPrenotazione() {
    	$view=USingleton::getInstance('VPrenotazione');
    	$session=USingleton::getInstance('USession');
    	
    	$EPrenotazione=new EPrenotazione();
    	$FPrenotazione=new FPrenotazione();
    	$dati_prenotazione=$view->getDatiCreaPrenotazione();
    	$idpartita=$view->getIdPartita();
    	$username=$session->leggi_valore('username');
    	
    	$FPartita=new FPartita();
    	$partita=$FPartita->load($idpartita);
    	$_array_dati_partita=$partita->getAllArray() ;
    	$disponibili=$_array_dati_partita['ndisponibili'];
    	if ($disponibili!=0){
    		$EPrenotazione->setUtenteusername($username);
    		$EPrenotazione->setPartitaID($idpartita);
    	
			$titolopartita=$_array_dati_partita['titolo'];
			$EPrenotazione->setTitoloPartita($titolopartita);
			if($dati_prenotazione['attrezzatura']==FALSE){
				$EPrenotazione->setAttrezzatura('');
			}
			else{
				$EPrenotazione->setAttrezzatura($dati_prenotazione['attrezzatura']);
			}
			$postiperterzi=$dati_prenotazione['perterzi'];
			$EPrenotazione->setPerterzi($postiperterzi);
			$EPrenotazione->setId($username.$_array_dati_partita['titolo']);
		
			$partita->setNdisponibili($disponibili-$postiperterzi-1);	
			$FPartita->update($partita);
			$FPrenotazione->store($EPrenotazione);
			$view->impostaDati('username', $username);
    	}
    	else{ 
    		$error='La partita &egrave al completo, impossibbile prenotarsi';
    		$view->impostaDati('errore', $error);
    	}
    	$view->setLayout('confermacrea');
    	return $view->processaTemplate();
    }
    
    
    
    

    /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinchè il compito venga eseguito.
     * @access public
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VPrenotazione');
        switch ($view->getTask()) {
            case 'salvaprenotazione':
                return $this->salvaPrenotazione();
        }
    }
}

?>
