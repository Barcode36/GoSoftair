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
        print $pagine;
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','annunci');
        $view->impostaDati('utente',$username);
        $view->impostaDati('dati',$this->_array_dati_annunci);
        return $view->processaTemplate();      
    }
    
    
    public function apriAnnuncio() {
    	$view=USingleton::getInstance('VAnnunci');
    	$IDannuncio=$view->getIDannuncio();
    	$FAnnuncio = new FAnnuncio();
    	$annuncio=$FAnnuncio->load($IDannuncio);
    	if ($annuncio!=false) {
    		$dati_annuncio=get_object_vars($annuncio);
    		$view->impostaDati('datiAnnuncio', $dati_annuncio);
    	}
    	$view->setLayout('dettagli');
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
		$file=$view->getFile();
        if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/annunci/".$session->leggi_valore('username').'/';
            $target=$dir.'profilo'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EAnnuncio->immagine=$target;               
                
            }
        }
		$EAnnuncio->IDannuncio=($session->leggi_valore('username').$dati_an['Titolo']);
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
            case 'apriannuncio':
                return $this->apriAnnuncio();
                
            }
        }
}
