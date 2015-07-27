<?php
/**
 * @access public
 * @package Entity
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
	 * @var $partitaIDpartita Variabile contenente l'identificativo della partita dove è inserito il commento
	 * @AttributeType string
	 */
	private $partitaIDpartita;
	/**
	 * @var $voto Variabile contenente il voto assegnato alla partita
	 * @AttributeType int
	 */
	private $voto;
	
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
	public function setVoto($voto) {
		$this->voto = $voto;
	}
	
	/**
	 * restituisce un array contenente tutti gli attributi dell'oggetto
	 * @access public
	 * @return array Array associativo dove la chiave e il nome dell'attributo e il valore è il suo contenuto
	 *
	 */
	public function getAllArray() {
		$dati=array('id'=> $this->id,
				'testo'=> $this->testo,
				'partitaIDpartita'=> $this->partitaIDpartita,
				'voto'=> $this->voto);
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