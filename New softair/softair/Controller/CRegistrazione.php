<?php
/**
 * Descrizione di CRegistrazione
 * La classe permette la gestione della registrazione di un utente.
 * 
 * @package Control
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class CRegistrazione {
    /**
     * @var string $_username
     */
    private $_username=null;
    /**
     * @var string $_password
     */
    private $_password=null;
    /**
     * @var string $_errore
     */
    private $_errore='';
    
    /**
     * Controlla se l'utente � registrato ed autenticato
     * @access public
     * @return boolean
     */
    public function getUtenteRegistrato() {
        $autenticato=false;
        $session=USingleton::getInstance('USession');
        $VRegistrazione= USingleton::getInstance('VRegistrazione');
        $task=$VRegistrazione->getTask();
        $controller=$VRegistrazione->getController();
        $this->_username=$VRegistrazione->getUsername();
        $this->_password=$VRegistrazione->getPassword();
        if ($session->leggi_valore('username')!=false) {
            $autenticato=true;
            //autenticato
        } elseif ($task=='autentica' && $controller='registrazione') {
            //controlla autenticazione
            $autenticato=$this->autentica($this->_username, $this->_password);
        }
        if ($task=='esci' && $controller='registrazione') {
            //logout
            $this->logout();
            $autenticato=false;
        }
        $VRegistrazione->impostaErrore($this->_errore);
        $this->_errore='';
        return $autenticato;
    }
    
    /**
     * Controlla se una coppia username e password corrispondono ad un utente regirtrato ed in tal caso impostano le variabili di sessione relative all'autenticazione
     * @access public
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function autentica($username, $password) {
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        if ($utente!=false) {
            if ($utente->getAccountAttivo()) {
                //account attivo
                if ($username==$utente->getUsername() && $password==$utente->getPassword()) {
                    $session=USingleton::getInstance('USession');
                    $session->imposta_valore('username',$username);
                    $session->imposta_valore('nome_cognome',$utente->getNome().' '.$utente->getCognome());
                    return true;
                } else {
                    $this->_errore='Username o password errati';
                    //username password errati
                }
            } else {
                $this->_errore='L\'account non &egrave; attivo';
                //account non attivo
            }
        } else {
            $this->_errore='L\'account non esiste';
            //account non esiste
        }
        return false;
    }
    
    /**
     * Crea un utente sul database controllando che non esista gi�
     * @access public
     * @return mixed
     */
    public function creaUtente() {
        $view=USingleton::getInstance('VRegistrazione');
        $dati_registrazione=$view->getDatiRegistrazione();
        $utente=new EUtente();
        $FUtente=new FUtente();
        $result = $FUtente->load($dati_registrazione['username']);
        $registrato=false;
        if ($result==false) {
            //utente non esiste
            if($dati_registrazione['password_1']==$dati_registrazione['password']) {
                unset($dati_registrazione['password_1']);
                $utente->setDatiRegistrazione($dati_registrazione['nome'], $dati_registrazione['cognome'], $dati_registrazione['username'], $dati_registrazione['password'], $dati_registrazione['email'], $dati_registrazione['via'], $dati_registrazione['CAP'], $dati_registrazione['citta']);
                $utente->generaCodiceAttivazione();
                $FUtente->store($utente);
                $this->emailAttivazione($utente);
                $registrato=true;
            } else {
                $this->_errore='Le password immesse non coincidono';
            }
        } else {
            //utente esistente
            $this->_errore='Username gi&agrave; utilizzato';
        }
        if (!$registrato) {
            $view->impostaErrore($this->_errore);
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modulo');
            $result.=$view->processaTemplate();
            $view->impostaErrore('');
            return $result;
        } else {
            $view->setLayout('conferma_registrazione');
            return $view->processaTemplate();
        }
    }
    
    /**
     * Invia un email contenente il codice di attivazione per un utente appena registrato
     * @access public
     * @global array $config
     * @param EUtente $utente
     * @return boolean
     */
    public function emailAttivazione(EUtente $utente) {
    	$VRegistrazione=USingleton::getInstance('VRegistrazione');
    	$email_webmaster='info@gosoftair.com';
    	$VRegistrazione->impostaDati('email_webmaster',$email_webmaster);
    	
 		$to=$utente->getEmail();
 		$headers = "From: GoSoftair \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$link1='http://gosoftair.esy.es/index.php?controller=registrazione&task=attivazione&codice_attivazione='.$utente->getCodiceAttivazione().'&username='.$utente->getUsername();
		$link2='http://gosoftair.esy.es/index.php?controller=registrazione&task=attivazione';
	
		$VRegistrazione->setLayout('email_attivazione');
		$VRegistrazione->impostaDati('nome',$utente->getNome());
		$VRegistrazione->impostaDati('username',$utente->getUsername());
		$VRegistrazione->impostaDati('codice_attivazione',$utente->getCodiceattivazione());
		$VRegistrazione->impostaDati('link1',$link1);
		$VRegistrazione->impostaDati('link2',$link2);
	
		$message=$VRegistrazione->processaTemplate();
	
		mail($to, 'Registrazione', $message, $headers);

	  
	}
    
    /**
     * Attiva un utente che inserisce un codice di attivazione valido oppure clicca 
     * sul link di autenticazione nell'email
     * @access public
     * @return string
     */
    public function attivazione() {
        $view = USingleton::getInstance('VRegistrazione');
        $dati_attivazione=$view->getDatiAttivazione();
        $FUtente=new FUtente();
        $utente=$FUtente->load($dati_attivazione['username']);
        if ($dati_attivazione!=false) {
        	print 'hhh'.$dati_attivazione['codice'].'hhhh';
            if ($utente->getCodiceAttivazione()==$dati_attivazione['codice']) {
                $utente->setStato('attivo');
                $FUtente->update($utente);
                $view->setLayout('conferma_attivazione');
            } else {
                $view->impostaErrore('Il codice di attivazione &egrave; errato');
                $view->setLayout('problemi');
            }
        } else {
            $view->setLayout('attivazione');
        }
        return $view->processaTemplate();
    }
    
    /**
     * Mostra il modulo di registrazione
     * @access public
     * @return string
     */
    public function moduloRegistrazione() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('modulo');
        return $VRegistrazione->processaTemplate();
    }
    
    /**
     * @access public
     * EfFettua il logout
     */
    public function logout() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('diritti');
        $session->cancella_valore('username');
        $session->cancella_valore('nome_cognome');
    }
    
    /**
     * @access public
     * Apre una pagina che permette di inserire l'username per recuperare la password
     * con l'invio di un email all'indirizzo email corrispondente messo in fase di registrazione
     * se l'utente acconsnte
     */
    public function passwordDimenticata() {
    	$VRegistrazione=USingleton::getInstance('VRegistrazione');
    	$VRegistrazione->setLayout('ricorda_password');
    	return $VRegistrazione->processaTemplate();
    }
    
    /**
     * @access public
     * Invio effettivo dell'email per recuperare la password dimenticata se viene fornito un
     * username valido
     */
    public function inviaPassword() {
    	$VRegistrazione=USingleton::getInstance('VRegistrazione');
    	$email_webmaster='info@gosoftair.com';
    	$VRegistrazione->impostaDati('email_webmaster',$email_webmaster);
    	$this->_username=$VRegistrazione->getUsername();
    	$FUtente=new FUtente();
    	$utente=$FUtente->load($this->_username);
    	if ($utente!=false) {
    		$VRegistrazione->setLayout('email_password');
    		$to=$utente->getEmail();
    		$headers = "From: GoSoftair \r\n";
    		$headers .= "MIME-Version: 1.0\r\n";
    		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    		$VRegistrazione->impostaDati('nome',$utente->getNome());
    		$VRegistrazione->impostaDati('username',$utente->getUsername());
    		$VRegistrazione->impostaDati('password',$utente->getPassword());
    		$message=$VRegistrazione->processaTemplate();
    		mail($to, 'Registrazione', $message, $headers);
    	}
    	else{
    		$errore=TRUE;
    		$VRegistrazione->impostaDati('errore',$errore);
    	}
    	$VRegistrazione->setLayout('conferma_inviapassword');
    	return $VRegistrazione->processaTemplate();
    }
     
     /**
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinch� il compito venga eseguito.
     * @access public
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'registra':
                return $this->moduloRegistrazione();
            case 'salva':
                return $this->creaUtente();
            case 'attivazione':
                return $this->attivazione();
            case 'password_dimenticata':
                return $this->passwordDimenticata();
            case 'invia_password':
               	return $this->inviaPassword();
        }
    }
}

?>
