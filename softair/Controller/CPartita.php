<?php
/**
 * Descrizione di CPartita
 * La classe gestisce le partite, permettendone la visualizzazione, la modifica e la crezione.
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CPartita {
	
    /**
     * La funzione viene richiamata quando si decide di vedere i dettagli di una partita.
     * Carica i dati relativi all'annuncio dal Database sfruttando l'id della partita
     * se la partita non è più vecchia di 7 giorni fa altrimenti procede alla sua cancellazione
     * con tutto cio che la riguarda.
     * @access public
     * @return mixed
     */
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
    		$dati=$partita->getAllArray() ;
    		if ( is_array( $commenti )  ) {
    			for ($i=0; $i<count($commenti);$i++){
    				$arrayCommenti[$i]=$commenti[$i]->getAllArray() ;
    				$tmp = DateTime::createFromFormat('Y-m-d',$arrayCommenti[$i]['data']);
    				$arrayCommenti[$i]['data']=$tmp->format('d/m/Y');
    			
    			}
    		}
    		$dati['commento']=$arrayCommenti;
    		$start = DateTime::createFromFormat('Y-m-d',$dati['data']);
    		$dati['data']=$start->format('d/m/Y');
    		$dati['ndisponibiliterzi']=$dati['ndisponibili']-1;
    		$view->impostaDati('dati',$dati);
    		$username=$session->leggi_valore('username');
    		$FPrenotazione=new FPrenotazione();
    	
    		//mette in utenti che passa alla view e quindi al template gli utenti registrati alla partita
    		$prenotazioni=$FPrenotazione->loadfrompartita($id_partita);
    		if ($prenotazioni!=false) {
    			$i=0;
    			while ($i<count($prenotazioni)) {
    				$_array_dati_partite[$i]=$prenotazioni[$i]->getAllArray() ;
    				$utenti[$i]=$_array_dati_partite[$i]['utenteusername'];
    				$perterzi[$i]=$_array_dati_partite[$i]['perterzi'];
    				$i++;
    			}
    			$view->impostaDati('utenti', $utenti);
    			$view->impostaDati('perterzi', $perterzi);
    		}
    	
    		//controlla se l'utente è registrato e se è gia prenotato a questa partita
    		if ($username!=false){
    			$giaPrenotato=false;
    			$prenotazioni=$FPrenotazione->loadfromuser($username);
    			if ($prenotazioni!=false) {
    				$i=0;
    				while ($i<count($prenotazioni)) {
    					$_array_dati_partite[$i]=$prenotazioni[$i]->getAllArray() ;
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
     * La funzione imposta la pagina che permette la creazione di una partita attraverso una form.
     * @access public
     * @return mixed
     */
    public function moduloCreaPartita() {
    	$VPartita=USingleton::getInstance('VPartita');
    	$session=USingleton::getInstance('USession');
    	//presetta la data della partita a domani
    	$date=USingleton::getInstance('UData');
    	$temp=$date->sommaGiorniYmd(date("Y-m-d"),'-',1);
    	$start = DateTime::createFromFormat('Y-m-d', $temp);
    	$domani=$start->format('d/m/Y');
    	$VPartita->impostaDati('domani', $domani);
    	$username=$session->leggi_valore('username');
    	$VPartita->impostaDati('username', $username);
    	return $VPartita->processaTemplate();
    }
     
    /**
     * La funzione viene ruchiamato quando l'utente conferma di aver finito di creare l'annuncio.
     * Salva sul Database la partita e nel caso l'utente lo abbia richiesto fa anche una prenotazione
     * a suo nome.
     * @access public
     * @return mixed
     */
    public function creaPartita() {
	    $view=USingleton::getInstance('VPartita');
		$session=USingleton::getInstance('USession');

        $EPartita=new EPartita();
        $FPartita=new FPartita();
		$dati_registrazione=$view->getDatiCreaPartita();
		
		$temp=$dati_registrazione['Data'];
		$start = DateTime::createFromFormat('d/m/Y', $temp);
		$data=$start->format('Y-m-d');
		
		$ora=$dati_registrazione['Ora'].'.'.$dati_registrazione['Minuti'];
		
		$username=$session->leggi_valore('username');
		$EPartita->setAutore($username);
		$EPartita->setTitolo($dati_registrazione['Titolo']);
		$EPartita->setIndirizzo($dati_registrazione['Indirizzo']);
		$EPartita->setData($data);
		$EPartita->setOra($ora);
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
			$EPrenotazione->setId($username.$titolopartita);
			
			$EPartita->setNdisponibili($dati_registrazione['Giocatori']-1);
			$FPartita->update($EPartita);
			$FPrenotazione->store($EPrenotazione);
			
		}
		$view->impostaDati('username', $username);
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