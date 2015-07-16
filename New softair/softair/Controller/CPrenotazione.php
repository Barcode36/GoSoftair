<?php
/**
 * @access public
 * @package Controller
 */
class CPrenotazione {
    /**
     * Variabile contenente lo stato attuale dell'prenotazione/prenotazioni
     *
     * @var EPrenotazione
     */
    private $_prenotazioni;
 
    //*********************************************************
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
    	$_array_dati_partita=get_object_vars($partita);
    	$disponibili=$_array_dati_partita['ndisponibili'];
    	if ($disponibili!=0){
    		$EPrenotazione->utenteusername=$username;
    		$EPrenotazione->partitaID=$idpartita;
    	
			$titolopartita=$_array_dati_partita['titolo'];
			$EPrenotazione->titoloPartita=$titolopartita;
			$EPrenotazione->attrezzatura=$dati_prenotazione['attrezzatura'];
			$EPrenotazione->id=$username.$_array_dati_partita['titolo'];
		
			$partita->setNdisponibili($disponibili-1);	
			$FPartita->update($partita);
			$FPrenotazione->store($EPrenotazione);
    	}
    	else{ 
    		$error='La partita &egrave al completo, impossibbile prenotarsi';
    		$view->impostaDati('errore', $error);
    	}
    	$view->setLayout('confermacrea');
    	return $view->processaTemplate();
    }
    
    
    
    

    /**
     * Smista le richieste ai vari metodi
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VPrenotazione');
        switch ($view->getTask()) {

            //********************************************
            case 'salvaprenotazione':
                return $this->salvaPrenotazione();
        }
    }
}

?>
