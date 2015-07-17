<?php
class UData {
	
	//fa la differenza tra due date	
	public  function delta_tempo($data_iniziale,$data_finale,$unita)
	{
		$data1 = strtotime($data_iniziale);
		$data2 = strtotime($data_finale);
	
		switch($unita) {
			case 'm': $unita = 1/60; break; //MINUTI
			case 'h': $unita = 1; break;	//ORE
			case 'g': $unita = 24; break;	//GIORNI
			case 'a': $unita = 8760; break; //ANNI
		}
	
		$differenza = (($data2-$data1)/3600)/$unita;
		return floor($differenza);
	}
	
	//calcola i giorni di differenza da oggi
	public function diff_daoggi($data1){
		$data2=date("Y-m-d");
		return $this->delta_tempo($data1,$data2, 'g');	
	}
	
	
	//calcola la data tra $giorni con data in ingresso in formato d/m/Y
	public function sommaMese($data, $giorni){
		$temp=$this->sommaGiorniYmd($data,'-',$giorni);
		$start = DateTime::createFromFormat('Y-m-d', $temp);
		$data=$start->format('d/m/Y');
		return $data;
	}
	
	//calcola da data sommandoci dei giorni ma in formato Y-m-d
	public function sommaGiorniYmd($data,$separatoreData,$nGiorniDaSommare){
		list($anno,$mese,$giorno) = explode($separatoreData,$data);
		return date("Y-m-d",mktime(0,0,0,$mese,$giorno+$nGiorniDaSommare,$anno));
	}
	

	//verifica se $data1 è successiva a $data2
	public function seMaggiore($data1, $data2){
		$start1 = DateTime::createFromFormat('d/m/Y', $data1);
		$temp1=$start1->format('Y-m-d');
		$start2 = DateTime::createFromFormat('d/m/Y', $data2);
		$temp2=$start2->format('Y-m-d');
		$temp1=strtotime($temp1);
		$temp2=strtotime($temp2);
		if($temp1>$temp2)
			$maggiore=true;
		else 
			$maggiore=false;
		
		return $maggiore;
	}
	
	//verifica se $data1 è successiva a oggi
	public function sePrimaOggi($data2){
		$data1=date("d/m/Y");
		return $this->seMaggiore($data1, $data2);
	}
	
	
}
?>