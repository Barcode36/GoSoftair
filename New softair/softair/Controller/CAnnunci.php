<?php
/**
 * Descrizione di CAnnunci
 * 
 * @package Control
 * @access public
 */
class CAnnunci {
    private $_array_dati_annunci;

    private $_annunci_per_pagina=6;
    /**
     * Passa i dati relativi all'utente partire prenotazte che restituisce una pagina contenente
     * la pagina profilo
     * @return mixed
     */
    public function vediAnnunci(){
    	$session=USingleton::getInstance('USession');
    	$username=$session->leggi_valore('username');
        $view = USingleton::getInstance('VAnnunci');
        $this->_annunci_per_pagina=4;
        $FAnnuncio=new FAnnuncio();
        $limit=$view->getPage()*$this->_annunci_per_pagina.','.$this->_annunci_per_pagina;
        $num_risultati=count($FAnnuncio->search());
        $pagine = ceil($num_risultati/$this->_annunci_per_pagina);
        $risultato=$FAnnuncio->search(array(), '`IDannuncio`', $limit);
        if ($risultato!=false) {
            foreach ($risultato as $item) {
                $tmpAnnuncio=$FAnnuncio->load($item->IDannuncio);
                $this->_array_dati_annunci[]=get_object_vars($tmpAnnuncio);
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','annunci');
        $view->impostaDati('utente',$username);
        $view->impostaDati('dati',$this->_array_dati_annunci);
        return $view->processaTemplate();      
    }
	
	
	public function moduloCreaAnnuncio() {
        $VAnnunci=USingleton::getInstance('VAnnunci');
		$VAnnunci->setLayout("crea");
        return $VAnnunci->processaTemplate();
    }
	
	public function creaAnnuncio() {
	    $view=USingleton::getInstance('VAnnunci');
		$session=USingleton::getInstance('USession');

        $EAnnuncio=new EAnnuncio();
        $FAnnuncio=new FAnnuncio();
		$dati_an=$view->getDatiCreaAnnuncio();	
		$EAnnuncio->autoreusername=$session->leggi_valore('username');
		$EAnnuncio->titolo=$dati_an['Titolo'];
		$EAnnuncio->descrizione=$dati_an['Descrizione'];
		$EAnnuncio->prezzo=$dati_an['Prezzo'];
		$EAnnuncio->telefono=$dati_an['Numero'];
		//$EAnnuncio->immagine=$dati_an['Immagine'];
		$EAnnuncio->IDAnnuncio=($session->leggi_valore('username').$dati_an['Titolo']);
		echo($EAnnuncio->titolo.$EAnnuncio->autoreusername.$EAnnuncio->descrizione.$EAnnuncio->prezzo.$EAnnuncio->IDAnnuncio.$EAnnuncio->telefono);
        $FAnnuncio->store($EAnnuncio);
		$view->setLayout('confermacrea');
    	return $view->processaTemplate();
     }
    
    
    
    /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinché il compito venga eseguito. Esegue inoltre un 
     * controllo di sessione.
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VAnnunci');
        switch ($view->getTask()){
            case 'vediannunci':
                return $this->vediAnnunci();
			case 'CREA ANNUNCIO':
                return $this->creaAnnuncio();
			case 'moduloannuncio':
                return $this->moduloCreaAnnuncio();
                
            }
        }
}
