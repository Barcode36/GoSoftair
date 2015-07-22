<?php
/**
 * Descrizione di VAmminstratore
 * Classe VAmministratore, estende la classe view del package System e gestisce la visualizzazione 
 * e formattazione delle pagine di gestione del sito dell'amministratore.
 *
 * @package View
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class VAmministratore extends View {
	
	/**
	 * @access private
	 * @var string $_layout
	 */
	private $_layout='';
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function getTask() {
		if (isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}
	/**
	 * restituisce il controller passato per GET o POST
	 * @access public
	 * @return mixed
	 */
	public function getController() {
		if (isset($_REQUEST['controller']))
			return $_REQUEST['controller'];
		else
			return false;
	}
	
	/**
	 * restituisce il l'username dell'utente passato per GET o POST
	 * @access public
	 * @return mixed
	 */
	public function getUtente() {
		if (isset($_REQUEST['utente']))
			return $_REQUEST['utente'];
		else
			return false;
	}
	
	/**
	 * Restituisce l'id della partita passato per GET o POST
	 * @access public
	 * @return mixed
	 */
	public function getIdPartita() {
		if (isset($_REQUEST['id_partita'])) {
			return $_REQUEST['id_partita'];
		} else
			return false;
	}
	
	/**
	 * @access public
	 * @param string $layout
	 */
	public function setLayout($layout) {
		$this->_layout=$layout;
	}
	
	/**
	 * Processa il layout scelto nella variabile _layout
	 * @access public
	 * @return string
	 */
	public function processaTemplate() {
		return $this->fetch($this->_layout.'.tpl');
	}
	
	/**
	 * Imposta i dati nel template identificati da una chiave ed il relativo valore
	 * @access public
	 * @param string $key
	 * @param mixed $valore
	 */
	public function impostaDati($key,$valore){
		$this->assign($key,$valore);
	}
	
	/**
	 * recupera dal vettore _FILE il nome temporaneo del file.
	 * @access public
	 * @return string
	 */
	public function getFile() {
		if(isset($_FILES['Immagine']['tmp_name'])&&($_FILES['Immagine']['type']=="image/jpeg"||$_FILES['Immagine']['type']=="image/x-png"||$_FILES['Immagine']['type']=="image/gif")){
			return $_FILES['Immagine']['tmp_name'];
		}else{
			return false;
		}
	}
	
	/**
	 * recupera dal vettore _FILE il nome originale del file.
	 * @access public
	 * @return string
	 */
	public function getOriginalFile(){
		if(isset($_FILES['Immagine']['name'])){
			return $_FILES['Immagine']['name'];
		}else{
			return false;
		}
	}
	
	/**
	 * Restituisce l'array contenente i dati di creazione
	 * @access public
	 * @return array();
	 */
	public function getDatiCreaPartita() {
		$dati_richiesti=array('Titolo','Indirizzo','Descrizione','Giorno', 'Mese', 'Anno','Giocatori', 'Attrezzatura','Prezzo', 'Categoria', 'Partecipazione');
		$dati=array();
		foreach ($dati_richiesti as $dato) {
			if (isset($_REQUEST[$dato]))
				$dati[$dato]=$_REQUEST[$dato];
		}
		return $dati;
	}
	
}
?>