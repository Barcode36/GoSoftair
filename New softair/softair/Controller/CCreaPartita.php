<?php
/**
 * @access public
 * @package Controller
 */
class CCreaPartita {
    /**
     * @var string $_username
     */
    private $_username=null;
    
    /**
     * @var string $_errore
     */
    private $_errore='';
   
     /**
     * Crea una partita sul DB
     *
     * @return mixed
     */
    public function creaPartita() {
	    $view=USingleton::getInstance('VCreaPartita');
		$session=USingleton::getInstance('USession');

        $EPartita=new EPartita();
        $FPartita=new FPartita();
		$dati_registrazione=$view->getDatiCreaPartita();
						
		$EPartita->autore=$session->leggi_valore('username');
		$EPartita->titolo=($dati_registrazione['Titolo']);
		$EPartita->indirizzo=($dati_registrazione['Indirizzo']);
		$EPartita->data=($dati_registrazione['Data']);
		$EPartita->descrizione=($dati_registrazione['Descrizione']);
		$EPartita->ngiocatori=($dati_registrazione['Giocatori']);
		$EPartita->categoria=($dati_registrazione['Categoria']);
		
		$EPartita->setPrezzo($dati_registrazione['Prezzo']);
		
		$EPartita->IDpartita=($session->leggi_valore('username').$dati_registrazione['Titolo']);
        $FPartita->store($EPartita);
     }
    /**
     * Mostra il modulo di registrazione
     *
     * @return string
     */
    public function moduloCreaPartita() {
        $VCreaPartita=USingleton::getInstance('VCreaPartita');
        return $VCreaPartita->processaTemplate();
    }
   
    /**
     * Smista le richieste ai relativi metodi della classe
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VCreaPartita');
        switch ($view->getTask()) {
            case 'CREA PARTITA':
                return $this->creaPartita();
			case 'modulopartita':
                return $this->moduloCreaPartita();
           
        }
    }
}

?>
