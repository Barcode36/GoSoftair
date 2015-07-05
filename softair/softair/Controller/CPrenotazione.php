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
     * Aggiunge un libro al carrello
     *
     * @return string
     */
    public function aggiungi() {
        $view = USingleton::getInstance('Vprenotazione');
        $id_partita=$view->getIdPartita();
        $aggiorna=false;
        $FPartita=new FPartita();
        $partita=$FPartita->load($id_partita);

        $_libro=$libro;
        if ($this->_prenotazioni==false)
            $this->_prenotazioni=new EPrenotazione();
        $this->_prenotazioni->addItem($partita);
        $session=USingleton::getInstance('USession');
        $session->imposta_valore('prenotazioni',serialize($this->_prenotazioni));
        return $this->contenuto();
    }
	
	
	
	
	
	
    /**
     * Aggiorna le prenotazioni, se la quantità di una partita viene impostata a 0, la partita viene eliminato dal prenotazioni
     *
     * @return string
     */
    public function aggiorna() {
        $view = USingleton::getInstance('VPrenotazione');
        $quantita=$view->getArrayQuantita();
        debug ($quantita);

        if ($quantita!=false) {
            for($i=0; $i<count($quantita); $i++) {
                if ($quantita[$i+1]==0)
                    $this->_prenotazioni->removeItem($i);
                else {
                    $items=array();
                    $items=$this->_prenotazioni->getItems();
                    $items[$i]->quantita=$quantita[$i+1];
                }
            }
        }
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
            $dati['totale']=$this->_prenotazioni->getPrezzoTotale();
            foreach ($items as $item) {
                $dati['oggetti'][]=array_merge(get_object_vars($item->getPartita()), array('quantita' => $item->quantita));
            }
            debug($dati);
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
        $prenotazioni['totale']=$this->_prenotazioni->getPrezzoTotale();
        foreach ($items as $item) {
            $prenotazioni['oggetti'][]=array_merge(get_object_vars($item->getPartita()), array('quantita' => $item->quantita));
        }
        $view->impostaDati('prenotazioni', $prenotazioni);
        $view->setLayout('riepilogo');
        $session->imposta_valore('prenotazioni',serialize($this->_prenotazioni));
        return $view->processaTemplate();
    }
    /**
     * Svuota le prenotazioni e lo cancella dalla sessione
     *
     * @return string
     */
    public function svuota() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('prenotazioni');
        $this->_prenotazioni=false;
        return $this->contenuto();
    }
    /**
     * Invia un email di conferma all'utente che ha effettuato il pagamento
     *
     * @return boolean
     */
    public function emailConfermaPrenotazione(EPrenotazione $prenotazione) {
        global $config;
        $view=USingleton::getInstance('VPrenotazione');
        $view->setLayout('email_conferma');
        $utente=$prenotazione->getUtente();
        $dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente',$dati_utente);
        $items=$prenotazione->getItems();
        $prenotazioni['partite']=array();
        $prenotazioni['totale']=$this->_prenotazioni->getPrezzoTotale();
        foreach ($items as $item) {
            $prenotazioni['partite'][]=array_merge(get_object_vars($item->getPartita()), array('quantita' => $item->quantita));
        }
        $view->impostaDati('prenotazione',$prenotazioni);
        $corpo_email=$view->processaTemplate();
        $email=USingleton::getInstance('UEmail');
        return $email->invia_email($utente->email,$utente->nome.' '.$utente->cognome,'Conferma prenotazione softair',$corpo_email,'Contenuto non visibile, necessario client che supporti l\'HTML',true);
    }
    /**
     * Salva prenotazione nel database.
     *
     * @return string
     */
    public function salvaPrenotazione() {
        $view = USingleton::getInstance('VPrenotazione');
        $dati_pagamento=$view->getDatiPagamento();
        $FPrenotazione=new FPrenotazione();
        $this->_prenotazioni->setData(date('d-m-Y'));
        $FPrenotazione->store($this->_prenotazioni);
        $this->emailConfermaPrenotazione($this->_prenotazioni);
        $view->setLayout('termine');
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('prenotazioni');
        return $view->processaTemplate();
    }
    /**
     * Mostra il modulo per il pagamento
     *
     */
    public function moduloPagamento() {
        $view = USingleton::getInstance('VPrenotazione');
        $view->setLayout('pagamento');
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
            case 'Svuota':
                return $this->svuota();
            case 'Prenota':
                return $this->riepilogo();
            case 'Conferma':
                return $this->moduloPagamento();
            case 'Effettua il pagamento':
                return $this->salvaPrenotazione();
        }
    }
}

?>
