<?php
class UData {
	
	//fa la differenza tra due date
	public function diff_date_ingiorni($data1,$data2){
	/* $data1 e data2 vanno inserite
	 * in formato gg/mm/aaaa, se nulle
	 * prende come data di riferimento
	 * quella di oggi.
	 */
		if(empty($data1)) $data1 = date('d/m/Y');
		if(empty($data2)) $data2 = date('d/m/Y');
		$d1 = explode('/',$data1);
		$d2 = explode('/',$data2);
		$timestamp1 = mktime(0, 0, 0, $d1[1], $d1[0], $d1[2]);
		$timestamp2 = mktime(0, 0, 0, $d2[1], $d2[0], $d2[2]);
		$seconds= $timestamp1 - $timestamp2;
		/* (86400 = 24h*60min*60sec) */
		$days = abs(intval($seconds / 86400));
		return ($days);
	}
	
	//calcola i giorni di differenza da oggi
	public function diff_daoggi($data2){
		$data1=date("d/m/Y");
		return $this->diff_date_ingiorni($data1,$data2);	
	}
	
	//calcola la data tra $giorni con data in ingresso in formato d/m/Y
	public function sommaMese($data, $giorni){
		$start = DateTime::createFromFormat('d/m/Y', $data);
		$temp=$start->format('Y-m-d');
		$temp=$this->sommaGiorniYmd($temp,'-',$giorni);
		$start = DateTime::createFromFormat('Y-m-d', $temp);
		$data=$start->format('d/m/Y');
		return $data;
	}
	
	//calcola da data sommandoci dei giorni ma in formato Y-m-d
	public function sommaGiorniYmd($data,$separatoreData,$nGiorniDaSommare){
		list($anno,$mese,$giorno) = explode($separatoreData,$data);
		return date("Y-m-d",mktime(0,0,0,$mese,$giorno+$nGiorniDaSommare,$anno));
	}
	
	
}
?>