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
 
 	$to=$utente->getEmail();
 	$headers = "From: GoSoftair \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$link1='http://gosoftair.esy.es/index.php?controller=registrazione&task=attivazione&codice_attivazione={'.$utente->getCodiceAttivazione().'}&username={'.$utente->getUsername().'}';
	$link2='http://gosoftair.esy.es/index.php?controller=registrazione&task=attivazione';
	$message = 
	'<html>
 	<head>
 	<title>Registrazione GoSoftair</title>
 	</head>
 	<body>
 	<h4>Ciao '.$utente->getNome().'</h4>
 	<p>Grazie per esserti registrato su Go Softair. Prima di attivare il tuo account è necessario compiere un ultimo passaggio per completare la registrazione!</br>
	Nota bene:  devi completare questo passaggio per diventare un utente registrato. Sarà  necessario cliccare sul link una sola volta e il tuo account verrà automaticamente attivato.</p>
 	<p>Per completare la registrazione, clicca sul collegamento qui sotto:</br>
	<a href='.$link1.'>Conferma registrazione</a></p>
	<p>**** Il collegamento non funziona? ****</br>
	Se il collegamento non dovesse funzionare, visita questo link:</br>
	<a href='.$link2.'>Conferma registrazione 2</a></p>
	<p>Assicurati di non aggiungere spazi aggiuntivi. Dovrai scrivere il tuo username e codice di attivazione nella pagina che apparirà.<p>
	<h4>Il tuo username è: '.$utente->getUsername().'</h4>
	<h4>Il tuo codice di attivazione è: '.$utente->getCodiceAttivazione().'</h4>
	<p>In caso di problemi con la registrazione contatta un membro del nostro staff all\'indirizzo: info@gosoftair.com</p>
	<p>Saluti, lo staff di GoSoftair</p>
	</body>
 	</html>
 	';

mail($to, 'Registrazione', $message, $headers);

	  
	   /* global $config;
        $view=USingleton::getInstance('VRegistrazione');
        $view->setLayout('email_attivazione');
        $view->impostaDati('username',$utente->getUsername());
        $view->impostaDati('nome_cognome',$utente->getNome().' '.$utente->getCognome());
        $view->impostaDati('codice_attivazione',$utente->getCodiceAttivazione());
        $view->impostaDati('email_webmaster',$config['email_webmaster']);
        $view->impostaDati('url',$config['url_softair']);
        $corpo_email=$view->processaTemplate();
        $email=USingleton::getInstance('UEmail');
        return $email->invia_email($utente->getEmail(),$utente->getNome().' '.$utente->getCognome(),'Attivazione account softair',$corpo_email);*/
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
     * Esegue un controllo sul compito che viene richiesto e quindi esegue le
     * dovute procedure affinch� il compito venga eseguito.
     * @access public
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'recupera_password':
                return $this->recuperaPassword();
            case 'registra':
                return $this->moduloRegistrazione();
            case 'salva':
                return $this->creaUtente();
            case 'attivazione':
                return $this->attivazione();
        }
    }
}

?>
