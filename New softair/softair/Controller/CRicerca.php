<?php
/**
 * Descrizione di CRicerca
 * La classe permette la visualizzazione  delle partite in base alla loro data 
 * o in base alla categoria, inoltre richiama la funzione di visualizzazione 
 * dei dettagli della partita e permette l'insermento dei commenti a una partita
 * se l'utente e registrato.
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CRicerca {
    /**
     * variabile che contiene il numero di partite per pagine
     * @var int
     */
    private $_partite_per_pagina=6;

    /**
     * La funzione imposta la pagina principale mostrando tutte le partite non più vecchie di
     * 7 giorni, ordinate per data.
     * @access public
     * @return mixed
     */
    public function ultimiArrivi() {
        $view = USingleton::getInstance('VRicerca');
        $this->_partite_per_pagina=4;
        $FPartita=new FPartita();
        $limit=$view->getPage()*$this->_partite_per_pagina.','.$this->_partite_per_pagina;
        $risultato=$FPartita->search(array(), '`partita`.`data` ASC, `partita`.`ndisponibili` DESC ', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            $j=0;
            for ($i=0; $i<count($risultato); $i++) {
                $tmpPartita=$FPartita->load($risultato[$i]->getId());
                
                $date=USingleton::getInstance('UData');
                $dataPartita=$tmpPartita->getData();
                $giorni=$date->diff_daoggi($dataPartita);
                if($giorni>7){
                	$FPrenotazione=new FPrenotazione();
                	$prenoRelative=$FPrenotazione->loadfrompartita($risultato[$i]->getId());
                	if ($prenoRelative!='')
                		$FPrenotazione->deleteRel($prenoRelative);
                	$FCommento=new FCommento();
                	$commRelative=$FCommento->loadCommenti($risultato[$i]->getId());
                	if ($commRelative!='')
                		$FCommento->deleteRel($commRelative);
                	$FPartita->delete($risultato[$i]);
                }
                else{
                	$prenota[$i]='prenotabile';
                	if($giorni>0){
                		$prenota[$i]='non_prenotabile';
                	}
                	$array_risultato[$j]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
                	//2 righe sotto ritrasformano la data nel formato voluto
                	$start = DateTime::createFromFormat('Y-m-d',$array_risultato[$j]['data']);
                	$array_risultato[$j]['data']=$start->format('d/m/Y');
                	$j++;
                } 
           }
           $view->impostaDati('prenota', $prenota);
           $view->impostaDati('dati',$array_risultato);
        }
        $num_risultati=count($FPartita->search());
        $pagine = ceil($num_risultati/$this->_partite_per_pagina);
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','ultimi_arrivi');
        return $view->processaTemplate();
    }
    /**
     * Seleziona sul database le partite non più vecchie di 7 giorni per mostrarli all'utente 
     * e li filtra in base alle variabili passate ad esempio categorie o stringhe di ricerca.
     * @access public
     * @return string
     */
    public function lista(){
        $view = USingleton::getInstance('VRicerca');
        $FPartita=new FPartita();
        $parametri=array();
        $categoria=$view->getCategoria();
        $parola=$view->getParola();
        if ($categoria!=false){
            $parametri[]=array('categoria','=',$categoria);
        }
        if ($parola!=false){
            $parametri[]=array('titolo','LIKE','%'.$parola.'%');
        }
        $limit=$view->getPage()*$this->_partite_per_pagina.','.$this->_partite_per_pagina;
        $num_risultati=count($FPartita->search($parametri));
        $pagine = ceil($num_risultati/$this->_partite_per_pagina);
        $risultato=$FPartita->search($parametri, '`partita`.`data` ASC, `partita`.`ndisponibili` DESC ', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            $j=0;
            for ($i=0; $i<count($risultato); $i++) {
            	$tmpPartita=$FPartita->load($risultato[$i]->getId());
       
            	$date=USingleton::getInstance('UData');
            	$dataPartita=$tmpPartita->getData();
            	$giorni=$date->diff_daoggi($dataPartita);
            	if($giorni>7){
            		$FPrenotazione=new FPrenotazione();
            		$prenoRelative=$FPrenotazione->loadfrompartita($risultato[$i]->getId());
            		if ($prenoRelative!='')
            			$FPrenotazione->deleteRel($prenoRelative);
            		$FCommento=new FCommento();
            		$commRelative=$FCommento->loadCommenti($risultato[$i]->getId());
            		if ($commRelative!='')
            			$FCommento->deleteRel($commRelative);
            		$FPartita->delete($risultato[$i]);
            	}
            	else{
            	    $prenota[$i]='prenotabile';
                	if($giorni>0){
                		$prenota[$i]='non_prenotabile';
                	}
            		$array_risultato[$j]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
            		//2 righe sotto ritrasformano la data nel formato voluto
            		$start = DateTime::createFromFormat('Y-m-d',$array_risultato[$j]['data']);
            		$array_risultato[$j]['data']=$start->format('d/m/Y');
            		$j++;
            	}
            }
            $view->impostaDati('prenota', $prenota);
            $view->impostaDati('dati',$array_risultato);
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        return $view->processaTemplate();
    }
    

    
    
    
    /**
     * Mostra i dettagli di una partita, con la descrizione completa, i commenti e 
     * il form per l'invio di commenti e la registrazione solo per utenti registrati.
     * @access public
     * @return string
     */
    public function dettagli() {
    	$session=USingleton::getInstance('USession');
        $view = USingleton::getInstance('VRicerca');
        $id_partita=$view->getIdPartita();
        $session->imposta_valore('id_partita',$id_partita);
        $CPartita=new CPartita();
        $CPartita->apriPartita();
    }
    /**
     * Inserisce un commento nel database collegandolo alla relativa partita.
     * @access public
     * @return string
     */
    public function inserisciCommento() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view = USingleton::getInstance('VRicerca');
            $ECommento = new ECommento();
            $ECommento->setPartitaIDpartita($view->getIdPartita());
            $ECommento->setVoto($view->getVoto());
            $ECommento->setTesto($username." : ".$view->getCommento());
            $FCommento=new FCommento();
            $FCommento->store($ECommento);
            return $this->dettagli();
        }
    }
    
    /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinchè il compito venga eseguito.
     * @access public
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'ultimi_arrivi':
                return $this->ultimiArrivi();
            case 'dettagli':
                return $this->dettagli();
            case 'Inserisci':
                return $this->inserisciCommento();
            case 'lista':
                return $this->lista();
            case 'Cerca':
                return $this->lista();
        }
    }
}
?>
