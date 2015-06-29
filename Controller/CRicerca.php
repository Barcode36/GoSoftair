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
     * Seleziona sul database i libri con id più alto e li mostra nella pagina principale
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
        $risultato=$FPartita->search(array(), '`ISBN` DESC', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpPartita=$FPartita->load($item->ISBN);
                $array_risultato[]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','ultimi_arrivi');
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }
    /**
     * Seleziona sul database i libri per mostrarli all'utente e li filtra 
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
                $tmpPartita=$FPartita->load($item->ISBN);
                $array_risultato[]=array_merge(get_object_vars($tmpPartita),array('media_voti'=>$tmpPartita->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
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
