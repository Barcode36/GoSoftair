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
        	$date=USingleton::getInstance('UData');
        	$j=0;
        	for($i=0; $i<count($risultato);$i++) {
        		
                $tmpAnnuncio=$FAnnuncio->load($risultato[$i]->IDannuncio);
                $datainserimento=$tmpAnnuncio->getData();
                $giorni=$date->diff_daoggi($datainserimento);
                if($giorni<=31){
                	$this->_array_dati_annunci[$j]=get_object_vars($tmpAnnuncio);
               		$scadenza[$j]=$date->sommaMese($datainserimento,31);
                	$view->impostaDati('scadenza',$scadenza);
                	//2 righe sotto ritrasformano la data nel formato voluto
                	$start = DateTime::createFromFormat('Y-m-d',$this->_array_dati_annunci[$j]['data']);
                	$this->_array_dati_annunci[$j]['data']=$start->format('d/m/Y'); 
                	$j++;
                }
                else{
                	$FAnnuncio->delete($risultato[$i]);
                }
            }
        }
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
    		$date=USingleton::getInstance('UData');
    		$giorni=$date->diff_daoggi($annuncio->getData());
            if($giorni<=31){
    			$dati_annuncio=get_object_vars($annuncio);
    			//2 righe sotto ritrasformano la data nel formato voluto
    			$start = DateTime::createFromFormat('Y-m-d',$dati_annuncio['data']);
    			$dati_annuncio['data']=$start->format('d/m/Y');
    			$view->impostaDati('datiAnnuncio', $dati_annuncio);
    			$scadenza=$date->sommaMese($annuncio->getData(),31);
    			$view->impostaDati('scadenza',$scadenza);
    		}
    		else{
    			$FAnnuncio->delete($annuncio);
    		}
    	}
    	$view->setLayout('dettagli');
    	return $view->processaTemplate();	
    }
	
	
	public function moduloCreaAnnuncio() {
        $VAnnunci=USingleton::getInstance('VAnnunci');
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $VAnnunci->impostaDati('username', $username);
		$VAnnunci->setLayout("crea");
        return $VAnnunci->processaTemplate();
    }
	
	public function creaAnnuncio() {
	    $view=USingleton::getInstance('VAnnunci');
		$session=USingleton::getInstance('USession');

        $EAnnuncio=new EAnnuncio();
        $FAnnuncio=new FAnnuncio();
		$dati_an=$view->getDatiCreaAnnuncio();	
		$EAnnuncio->setAutoreusername($session->leggi_valore('username'));
		$EAnnuncio->setTitolo($dati_an['Titolo']);
		$EAnnuncio->setDescrizione($dati_an['Descrizione']);
		$EAnnuncio->setPrezzo($dati_an['Prezzo']);
		$EAnnuncio->setTelefono($dati_an['Numero']);
		$EAnnuncio->data=date("Y-m-d");
		$file=$view->getFile();
        if($file){
            $nomeOriginale=basename($view->getOriginalFile());
            $dir="./immagini/annunci/".$session->leggi_valore('username').'/';
            $target=$dir.'profilo'.'_'.$nomeOriginale;
            if(!is_dir($dir)){
                mkdir($dir,0755,true);
            }
            if(move_uploaded_file($file, $target)){
                $EAnnuncio->setImmagine($target);               
                
            }
        }
		$EAnnuncio->setId($session->leggi_valore('username').$dati_an['Titolo']);
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
?>