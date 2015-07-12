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
    /**
     * Costruttore, legge la variabile di sessione 'prenotazioni'
     */
    public function __construct() {
        $session=USingleton::getInstance('USession');
        $tmp_prenotazioni=$session->leggi_valore('prenotazioni');
        if ($tmp_prenotazioni!=false)
            $this->_prenotazioni=unserialize($tmp_prenotazioni);
    }

	    /**
     * Aggiunge una prenotazione alle prenotazioni
     *
     * @return string
     */
    public function aggiungi() {
        $view = USingleton::getInstance('Vprenotazione');
        $id_partita=$view->getIdPartita();
        $FPartita=new FPartita();
        $partita=$FPartita->load($id_partita);
        if ($this->_prenotazioni==false)
            $this->_prenotazioni=new EPrenotazione();
        $this->_prenotazioni->addItem($partita);
        $session=USingleton::getInstance('USession');
        $session->imposta_valore('prenotazioni',serialize($this->_prenotazioni));
        return $this->contenuto();
    }
		
	
	

    /**
     * Mostra il contenuto delle prenotazioni
     *
     * @return string
     */
    public function contenuto() {
        $view = USingleton::getInstance('VPrenotazione');
        $session=USingleton::getInstance('USession');
        if ($session->leggi_valore('username')!=false)
            $view->setLayout('prenotazioni_registrato');

        if ($this->_prenotazioni!=false) {
            $items=$this->_prenotazioni->getItems();
            $dati['oggetti']=array();
            foreach ($items as $item) {
                $dati['oggetti'][]=get_object_vars($item->getPartita() );
            }
            $view->impostaDati('dati',$dati);
        }
        return $view->processaTemplate();
    }
    /**
     * Mostra il repilogo delle partite che si stanno per prenotare
     *
     * @return string
     */
    public function riepilogo() {
        $view = USingleton::getInstance('VPrenotazione');
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        $this->_prenotazioni->setUtente($utente);
        $dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente', $dati_utente);
        $items=$this->_prenotazioni->getItems();
        $prenotazioni['oggetti']=array();
        foreach ($items as $item) {
            $prenotazioni['oggetti'][]=get_object_vars($item->getPartita());
        }
        $view->impostaDati('prenotazioni', $prenotazioni);
        $view->setLayout('riepilogo');
        $session->imposta_valore('prenotazioni',serialize($this->_prenotazioni));
        return $view->processaTemplate();
    }
    
    //*********************************************************
    public function salvaPrenotazione() {
    	$view=USingleton::getInstance('VPrenotazione');
    	$session=USingleton::getInstance('USession');
    	
    	$EPrenotazione=new EPrenotazione();
    	$FPrenotazione=new FPrenotazione();
    	$dati_prenotazione=$view->getDatiCreaPrenotazione();
    	$idpartita=$view->getIdPartita();
    	$username=$session->leggi_valore('username');
    	
    	$EPrenotazione->utenteusername=$username;
    	$EPrenotazione->partitaID=$idpartita;
    	
    	$FPartita=new FPartita();
    	$partita=$FPartita->load($idpartita);
		$_array_dati_partita=get_object_vars($partita);
		$titolopartita=$_array_dati_partita['titolo'];
		
		$EPrenotazione->titoloPartita=$titolopartita;
		$EPrenotazione->attrezzatura=$dati_prenotazione['attrezzatura'];
		$EPrenotazione->id=$username.$_array_dati_partita['titolo'];
		
		$FPrenotazione->store($EPrenotazione);
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
            case 'contenuto':
                return $this->contenuto();
            case 'Aggiungi alle prenotazioni':
                return $this->aggiungi();
            case 'Aggiorna Prenotazioni':
                return $this->aggiorna();
            //********************************************
            case 'salvaprenotazione':
                return $this->salvaPrenotazione();
        }
    }
}

?>
