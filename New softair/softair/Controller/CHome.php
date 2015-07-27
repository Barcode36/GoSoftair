<?php
/**
 * Descrizione di CHome
 * La classe imposta la pagina.
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CHome {
    
    /**
     * @access public
     * Imposta la pagina, controlla l'autenticazione
     */
    public function impostaPagina () {
        $CRegistrazione=USingleton::getInstance('CRegistrazione');
        $registrato=$CRegistrazione->getUtenteRegistrato();
        $VHome= USingleton::getInstance('VHome');
        $contenuto=$this->smista();
        $partita=USingleton::getInstance('FPartita');
        $categorie=$partita->getCategorie();
        $VHome->impostaTastiCategorie($categorie);
        $VHome->impostaContenuto($contenuto);
        $classifica=$this->classifica();
        $VHome->impostaDati('classifica',$classifica);
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($registrato) {
        	$VHome->impostaDati('username',$username);
            $VHome->impostaPaginaRegistrato();
        } else {
            $VHome->impostaPaginaGuest();
        }
        $VHome->mostraPagina();
    }
    
    
    /**
     * Imposta la classifica dei giocatori.
     * @access public
     */
    public function classifica() {
    	$VHome= USingleton::getInstance('VHome');
    	$FUtente=new FUtente();
    	$risultato=$FUtente->getUtentiPunti();
    	if ($risultato!=false) {
    		foreach ($risultato as $item) {
    			$username=$item->getUsername();
    			if($username!='AMMINISTRATORE'){
    			$tmpUtente=$FUtente->load($username);
    			$classifica[]=$tmpUtente->getAllArray();}
    		}
    	}
    	$posizione=[1,2,3,4,5,6,7,8,9];
    	$VHome->impostaDati('posizione',$posizione);
		return $classifica;
    }
    
    
    
     /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinchè il compito venga eseguito. Inoltre compie 
     * un controllo di sessione.
     * @access public
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VHome');
        switch ($view->getController()) {
            case 'registrazione':
                $CRegistrazione=USingleton::getInstance('CRegistrazione');
                return $CRegistrazione->smista();
            case 'ricerca':
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->smista();
            case 'prenotazione':
                $CPrenotazione=USingleton::getInstance('CPrenotazione');
                return $CPrenotazione->smista();
			case 'profilo':
              	$CProfilo=USingleton::getInstance('CProfilo');
               	return $CProfilo->smista();
			case 'partita':
               	$CPartita=USingleton::getInstance('CPartita');
               	return $CPartita->smista();
             case 'amministratore':
               	$CAmministratore=USingleton::getInstance('CAmministratore');
               	return $CAmministratore->smista();
			case 'annuncio':
               	$CAnnunci=USingleton::getInstance('CAnnunci');
               	return $CAnnunci->smista();
            default:
                $session=USingleton::getInstance('USession');
        		$username=$session->leggi_valore('username');
        		if($username!='AMMINISTRATORE'){
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->ultimiArrivi();}
        }
    }
}

?>
