<?php
/**
 * Descrizione di ECommento
 * Entita di Commento
 * 
 * @package Entity
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class ECommento {
	/**
	 * @var $id Variabile contenente l'identificativo del commento
	 * @AttributeType string
	 */
	private $id;
	/**
	 * @var $testo Variabile contenente il testo dell'annuncio
	 * @AttributeType string
	 */
	private $testo;
	/**
	 * @var $partitaIDpartita Variabile contenente l'identificativo della partita dove � inserito il commento
	 * @AttributeType string
	 */
	private $partitaIDpartita;
		
	/**
	 * @var $data Variabile contenente la data di svolgimento della partita
	 */
	private $data;
	/**
	 * @var $ora Variabile contenente l'ora della partita
	 * @AttributeType string
	 */
	private $ora;
	
	/**
	 * Imposta $id come  l'identificatico del commento
	 * @access public
	 * @param string $id
	 *
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * Imposta $testo come  testo del commento
	 * @access public
	 * @param string $testo
	 *
	 */
	public function setTesto($testo) {
		$this->testo = $testo;
	}
	
	/**
	 * Imposta $partitaIDpartita come identificativo della partita dov'� il commento
	 * 
	 * @access public
	 * @param string $partitaIDpartita
	 *
	 */
	public function setPartitaIDpartita($partitaIDpartita) {
		$this->partitaIDpartita= $partitaIDpartita;
	}
	
	/**
	 * Imposta $data come data di svolgimento della partita
	 * @access public
	 */
	public function setData($data)
	{
		$this->data=$data;
	}
	
	/**
	 * Imposta $ora come ora di svolgimento della partita
	 * @access public
	 */
	public function setOra($ora)
	{
		$this->ora=$ora;
	}
	
	/**
	 * restituisce un array contenente tutti gli attributi dell'oggetto
	 * @access public
	 * @return array Array associativo dove la chiave e il nome dell'attributo e il valore � il suo contenuto
	 *
	 */
	public function getAllArray() {
		$dati=array('id'=> $this->id,
				'testo'=> $this->testo,
				'partitaIDpartita'=> $this->partitaIDpartita,
				'data'=> $this->data,
				'ora'=> $this->ora,
		);
		return $dati;
	}
	
	
	/**
	 * @access public
	 * @return string Stringa contenente l'dentificativo del commento.
	 *
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @access public
	 * @return string Stringa contenente il testo del commento.
	 *
	 */
	public function getTesto()
	{
		return $this->testo;
	}
	
	/**
	 * @access public
	 * @return string Stringa contenente l'dentificativo della partita dov'� il commento.
	 *
	 */
	public function getPartitaIDpartita()
	{
		return $this->partitaIDpartita;
	}
	
	/**
	 * @access public
	 * @return  contenente la data di svolgimento della partita.
	 *
	 */
	public function getData() {
		return $this->data;
	}
	
	/**
	 * @access public
	 * @return  contenente l'ora di svolgimento della partita.
	 *
	 */
	public function getOra() {
		return $this->ora;
	}
}
?>