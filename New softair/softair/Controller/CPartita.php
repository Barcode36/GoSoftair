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
    	
    	// controlla che la data della partita non sia più vecchia di 7 giorni fa
    	// se lo è la cancella
    	$date=USingleton::getInstance('UData');
    	$dataPartita=$partita->getData();
    	$giorni=$date->diff_daoggi($dataPartita);
    	if($giorni>7){
    		$FPrenotazione=new FPrenotazione();
    		$prenoRelative=$FPrenotazione->loadfrompartita($partita->getId());
    		if ($prenoRelative!='')
    			$FPrenotazione->deleteRel($prenoRelative);
    		$FCommento=new FCommento();
    		$commRelative=$FCommento->loadCommenti($partita->getId());
    		if ($commRelative!='')
    			$FCommento->deleteRel($commRelative);
    		$FPartita->delete($partita);
    		$view->setLayout('cancellata');
    	}
    	else{
    		$prenota=TRUE;
    		if($giorni>0){
    			$prenota=FALSE;
    		}
    		$commenti=$partita->getCommenti();
    		$arrayCommenti=array();
    		$dati=get_object_vars($partita);
    		if ( is_array( $commenti )  ) {
    			foreach ($commenti as $commento){
    				$arrayCommenti[]=get_object_vars($commento);
    			}
    		}
    		$dati['commento']=$arrayCommenti;
    		$start = DateTime::createFromFormat('Y-m-d',$dati['data']);
    		$dati['data']=$start->format('d/m/Y');
    		$view->impostaDati('dati',$dati);
    		$username=$session->leggi_valore('username');
    		$FPrenotazione=new FPrenotazione();
    	
    		//mette in utenti che passa alla view e quindi al template gli utenti registrati alla partita
    		$prenotazioni=$FPrenotazione->loadfrompartita($id_partita);
    		if ($prenotazioni!=false) {
    			$i=0;
    			while ($i<count($prenotazioni)) {
    				$_array_dati_partite[$i]=get_object_vars($prenotazioni[$i]);
    				$utenti[$i]=$_array_dati_partite[$i]['utenteusername'];
    				$i++;
    			}
    			$view->impostaDati('utenti', $utenti);
    		}
    	
    		//controlla se l'utente è registrato e se è gia prenotato a questa partita
    		if ($username!=false){
    			$giaPrenotato=false;
    			$prenotazioni=$FPrenotazione->loadfromuser($username);
    			if ($prenotazioni!=false) {
    				$i=0;
    				while ($i<count($prenotazioni)) {
    					$_array_dati_partite[$i]=get_object_vars($prenotazioni[$i]);
    					if ($_array_dati_partite[$i]['partitaID']==$id_partita)
    						$giaPrenotato=true;
    					$i++;
    				}
    			}
    			$view->impostaDati('prenota', $prenota);
    			$view->impostaDati('username', $username);
    			$view->impostaDati('giaPrenotato', $giaPrenotato);
    			$view->setLayout('dettagli_registrato');
    		}else
    			$view->setLayout('dettagli');
    	}
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
		$data=$dati_registrazione['Anno'].'-'.$dati_registrazione['Mese'].'-'.$dati_registrazione['Giorno'];
		$username=$session->leggi_valore('username');
		$EPartita->setAutore($username);
		$EPartita->setTitolo($dati_registrazione['Titolo']);
		$EPartita->setIndirizzo($dati_registrazione['Indirizzo']);
		$EPartita->setData($data);
		$EPartita->setDescrizione($dati_registrazione['Descrizione']);
		$EPartita->setNgiocatori($dati_registrazione['Giocatori']);
		$EPartita->setNdisponibili($dati_registrazione['Giocatori']);
		$EPartita->setCategoria($dati_registrazione['Categoria']);
		$EPartita->setAttrezzatura($dati_registrazione['Attrezzatura']);
		$EPartita->setPrezzo($dati_registrazione['Prezzo']);
		$EPartita->setVotata('non_votata');
		$file=$view->getFile();
        if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/partite/".$session->leggi_valore('username').'/';
            $target=$dir.'partite'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EPartita->setImmagine($target);               
                
            }
        }
   		//l'idpartita così definito ha delle limitazioni
		$idpartita=$session->leggi_valore('username').$dati_registrazione['Titolo'];
        $EPartita->setIDpartita($idpartita);
        $FPartita->store($EPartita);
		
		//verifica se l'utente creatore vuole partecipare alla propia partita
		if($dati_registrazione['Partecipazione']==1)
		{
			
			$session=USingleton::getInstance('USession');
			 
			$EPrenotazione=new EPrenotazione();
			$FPrenotazione=new FPrenotazione();
			
			$EPrenotazione->setUtenteusername($username);
			$EPrenotazione->setPartitaID($idpartita);
			 
			$titolopartita=$dati_registrazione['Titolo'];
			$EPrenotazione->setTitoloPartita($titolopartita);
			$EPrenotazione->setAttrezzatura($dati_registrazione['Attrezzatura']);
			//l'id così definito ha dei limiti
			$EPrenotazione->setId($username.$titolopartita);
			
			$EPartita->setNdisponibili($dati_registrazione['Giocatori']-1);
			$FPartita->update($EPartita);
			$FPrenotazione->store($EPrenotazione);
			
		}
		
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
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $VPartita->impostaDati('username', $username);
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
            case 'Crea partita':
                return $this->creaPartita();
			case 'modulopartita':
                return $this->moduloCreaPartita();
             case 'apripartita':
                		return $this->apriPartita();           
        }
    }
}

?>