<?php
/**
 * @access public
 * @package Entity
 */
class ECommento {
	/**
	 * @var $IDannuncio Variabile contenente l'identificativo del commento
	 * @AttributeType string
	 */
	public $id;
	/**
	 * @var $testo Variabile contenente il testo dell'annuncio
	 * @AttributeType string
	 */
	public $testo;
	/**
	 * @var $partitaIDpartita Variabile contenente l'identificativo della partita dove è inserito il commento
	 * @AttributeType string
	 */
	public $partitaIDpartita;
	/**
	 * @var $voto Variabile contenente il voto assegnato alla partita
	 * @AttributeType int
	 */
	public $voto;
	
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
		$this->testi = $testo;
	}
	
	/**
	 * Imposta $partitaIDpartita come identificativo della partita dov'è il commento
	 * 
	 * @access public
	 * @param string $partitaIDpartita
	 *
	 */
	public function setPartitaIDpartita($partitaIDpartita) {
		$this->partitaIDpartita= $partitaIDpartita;
	}
	
	/**
	 * Imposta $voto come  voto alla partita
	 * @access public
	 * @param int $voto
	 *
	 */
	public function setVota($voto) {
		$this->voto = $voto;
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
	 * @return string Stringa contenente l'dentificativo della partita dov'è il commento.
	 *
	 */
	public function getPartitaIDpartita()
	{
		return $this->partitaIDpartita;
	}
	
	/**
	 * @access public
	 * @return int Intero contenente il voto alla partita.
	 *
	 */
	public function getVoto()
	{
		return $this->voto;
	}
}
?>