<?php
/**
 * @access public
 * @package Entity
 */
class ECommento {
	/**
	 * @AttributeType int
	 */
	public $id;
	/**
	 * @AttributeType string
	 */
	public $testo;
	public $partitaIDpartita;
	/**
	 * @AttributeType float
	 */
	public $voto;
	
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setTesto($testo) {
		$this->testi = $testo;
	}
	
	public function setPartitaIDpartita($partitaIDpartita) {
		$this->partitaIDpartita= $partitaIDpartita;
	}
	
	public function setVota($voto) {
		$this->voto = $voto;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getTesto()
	{
		return $this->testo;
	}
	
	public function getPartitaIDpartita()
	{
		return $this->partitaIDpartita;
	}
	
	public function getVoto()
	{
		return $this->voto;
	}
}
?>