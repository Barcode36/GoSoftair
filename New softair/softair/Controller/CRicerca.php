<?php
/**
 * @access public
 * @package Controller
 */
class CRicerca {
    /**
     * @var int
     */
    private $_partite_per_pagina=6;
    /**
     * Seleziona sul database le partite con id più alto e li mostra nella pagina principale
     *
     * @return string contenuto del template processato
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
                $tmpPartita=$FPartita->load($risultato[$i]->IDpartita);
                
                $date=USingleton::getInstance('UData');
                $dataPartita=$tmpPartita->getData();
                $giorni=$date->diff_daoggi($dataPartita);
                if($giorni>-7){
                	$FPrenotazione=new FPrenotazione();
                	$prenoRelative=$FPrenotazione->loadfrompartita($risultato[$i]->getId());
                	if ($prenoRelative!='')
                		$FPrenotazione->deleteRel($prenoRelative);
                	$FPartita->delete($risultato[$i]);
                }
                else{
                	$array_risultato[$j]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
                	//2 righe sotto ritrasformano la data nel formato voluto
                	$start = DateTime::createFromFormat('Y-m-d',$array_risultato[$j]['data']);
                	$array_risultato[$j]['data']=$start->format('d/m/Y');
                	$j++;
                } 
           }
        }
        $num_risultati=count($FPartita->search());
        $pagine = ceil($num_risultati/$this->_partite_per_pagina);
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','ultimi_arrivi');
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }
    /**
     * Seleziona sul database le partite per mostrarli all'utente e li filtra 
     * in base alle variabili passate
     * es categorie o stringhe di ricerca
     *
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
            	$tmpPartita=$FPartita->load($risultato[$i]->IDpartita);
            
            	$date=USingleton::getInstance('UData');
            	$dataPartita=$tmpPartita->getData();
            	$giorni=$date->diff_daoggi($dataPartita);
            	if($giorni>-7){
            		$FPrenotazione=new FPrenotazione();
            		$prenoRelative=$FPrenotazione->loadfrompartita($risultato[$i]->getId());
            		print $risultato[$i]->getId();
            		print $prenoRelative[1];
            		if ($prenoRelative!='')
            			$FPrenotazione->deleteRel($prenoRelative);
            		$FPartita->delete($risultato[$i]);
            	}
            	else{
            		$array_risultato[$j]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
            		//2 righe sotto ritrasformano la data nel formato voluto
            		$start = DateTime::createFromFormat('Y-m-d',$array_risultato[$j]['data']);
            		$array_risultato[$j]['data']=$start->format('d/m/Y');
            		$j++;
            	}
            }
            $view->impostaDati('dati',$array_risultato);
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        return $view->processaTemplate();
    }
    

    
    
    
    /**
     * Mostra i dettagli di una partita, con la descrizione completa, i commenti e il form per l'invio di commenti, solo per utenti registrati
     *
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
     * Inserisce un commento nel database collegandolo al relativo libro
     *
     * @return string
     */
    public function inserisciCommento() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view = USingleton::getInstance('VRicerca');
            $ECommento = new ECommento();
            $ECommento->partitaIDpartita=$view->getIdPartita();
            $ECommento->voto=$view->getVoto();
            $ECommento->testo=$username." : ".$view->getCommento();
            $FCommento=new FCommento();
            $FCommento->store($ECommento);
            return $this->dettagli();
        }
    }
    /**
     * Smista le richieste ai vari metodi
     *
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
