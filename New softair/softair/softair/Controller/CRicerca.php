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
        $num_risultati=count($FPartita->search());
        $pagine = ceil($num_risultati/$this->_partite_per_pagina);
        $risultato=$FPartita->search(array(), '`IDpartita` DESC', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpLibro=$FPartita->load($item->IDpartita);
                $array_risultato[]=array_merge(get_object_vars($tmpLibro),array('media_voti'=>$tmpLibro->getMediaVoti()));
            }
        }
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
            $parametri[]=array('descrizione','LIKE','%'.$parola.'%');
        }
        $limit=$view->getPage()*$this->_partite_per_pagina.','.$this->_partite_per_pagina;
        $num_risultati=count($FPartita->search($parametri));
        $pagine = ceil($num_risultati/$this->_partite_per_pagina);
        $risultato=$FPartita->search($parametri, '', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpLibro=$FPartita->load($item->IDpartita);
                $array_risultato[]=array_merge(get_object_vars($tmpLibro),array('media_voti'=>$tmpLibro->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }
    /**
     * Mostra i dettagli di una partita, con la descrizione completa, i commenti e il form per l'invio di commenti, solo per utenti registrati
     *
     * @return string
     */
    public function dettagli() {
        $view = USingleton::getInstance('VRicerca');
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

        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false)
            $view->setLayout('dettagli_registrato');
        else
            $view->setLayout('dettagli');
        return $view->processaTemplate();
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
            $ECommento->testo=$view->getCommento();
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