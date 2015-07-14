<?php
/**
 * @access public
 * @package Controller
 */
class CPartita {
    /**
     * @var string $_username
     */
    private $_username=null;
    
    /**
     * @var string $_errore
     */
    private $_errore='';
   
     
    public function apriPartita() {
    	$view=USingleton::getInstance('VPartita');
    	$session=USingleton::getInstance('USession');
        $id_partita=$view->getIdPartita();
    	$FPartita=new FPartita();
    	$partita=$FPartita->load($id_partita);
    	$commenti=$partita->getCommenti();
    	$arrayCommenti=array();
    	$dati=get_object_vars($partita);
    	if ( is_array( $commenti )  ) {
    		foreach ($commenti as $commento){
    			$arrayCommenti[]=get_object_vars($commento);
    		}
    	}
    	$dati['commento']=$arrayCommenti;
    	$view->impostaDati('dati',$dati);
    	$username=$session->leggi_valore('username');
    	if ($username!=false)
    		$view->setLayout('dettagli_registrato');
    	else
    		$view->setLayout('dettagli');
    		
    	return $view->processaTemplate();
    	
    }
     
     
     
     
     /**
     * Crea una partita sul DB
     *
     * @return mixed
     */
    public function creaPartita() {
	    $view=USingleton::getInstance('VPartita');
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
		$EPartita->ndisponibili=($dati_registrazione['Giocatori']);
		$EPartita->categoria=($dati_registrazione['Categoria']);	
		$EPartita->setPrezzo($dati_registrazione['Prezzo']);
		$file=$view->getFile();
        if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/partite/".$session->leggi_valore('username').'/';
            $target=$dir.'partite'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EPartita->immagine=$target;               
                
            }
        }
        /*else {echo("Errore, file non pervenuto");} da errore anche quando uno decide di non metterla propio l'immagine così
		e comunque non mettete echo diretti, al massimo impostate il mex in qualche variabile, che passate al tamplate e da li lo
		stampa a video o si perde la divisione tra logica di programmazione e quella di visualizzazione*/
		$EPartita->IDpartita=($session->leggi_valore('username').$dati_registrazione['Titolo']);
        $FPartita->store($EPartita);
		$view->setLayout('confermacrea');
    	return $view->processaTemplate();
     }
    /**
     * Mostra il modulo di registrazione
     *
     * @return string
     */
    public function moduloCreaPartita() {
        $VPartita=USingleton::getInstance('VPartita');
        return $VPartita->processaTemplate();
    }
   
    /**
     * Smista le richieste ai relativi metodi della classe
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VPartita');
        switch ($view->getTask()) {
            case 'CREA PARTITA':
                return $this->creaPartita();
			case 'modulopartita':
                return $this->moduloCreaPartita();
             case 'apripartita':
                		return $this->apriPartita();           
        }
    }
}

?>