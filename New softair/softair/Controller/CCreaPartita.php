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
        //$dati_creazione=$view->getDatiCreaPartita();
        $EPartita=new EPartita();
        $FPartita=new FPartita();
		$dati_registrazione=$view->getDatiCreaPartita();
		/*$keys= array_keys($dati_registrazione);                
                        $i=0;
                        foreach($dati_registrazione as $dato){                       
                            $metodo='set'.$keys[$i];                    
                            $EPartita->$metodo($dato);
                            $i++;
                        }*/
						
		$EPartita->autore=$session->leggi_valore('username');
		echo($EPartita->autore);
		$EPartita->titolo=$view->gettitolo();
		echo($EPartita->titolo);
       /* $EPartita->setAutore($session->leggi_valore('username'));
		$EPartita->setTitolo($dati_registrazione['titolo']);
		$EPartita->setIndirizzo($dati_registrazione['indirizzo']);
		$EPartita->setData($dati_registrazione['data']);
		$EPartita->setDescrizione($dati_registrazione['descrizione']);
		$EPartita->setNGiocatori($dati_registrazione['ngiocatori']);
		$EPartita->setCategoria($dati_registrazione['categoria']);
		$EPartita->setPrezzo($dati_registrazione['prezzo']);
		$EPartita->setIDpartita($session->leggi_valore('username').$dati_registrazione['titolo']);
		*/
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
