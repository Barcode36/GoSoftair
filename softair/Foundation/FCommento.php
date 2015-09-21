<?php
/**
 * Descrizione di FCommento
 * Foundation di Commento
 * 
 * @package Foundation
 * @author Davide Giancola
 * @author Mattia Ciolli
 * @author Vincenzo Cavallo
 * @access public
 */
class FCommento extends Fdb {
    public function __construct() {
        $this->_table='commento';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='ECommento';
        USingleton::getInstance('Fdb');
            }


	/**
     * Seleziona sul database i commenti di una partita
     *
     * @param string $partitaIDpartita
     * @return array
     */
    public function loadCommenti($partitaIDpartita){
        $parametri=array();
        $parametri[]=array('partitaIDpartita','=',$partitaIDpartita);
        $arrayCommenti=parent::search($parametri);
        return $arrayCommenti;
    }
    
    /**
     * Elimina dal database i commenti di una partita
     *
     * @param array $commenti
     */
    public function deleteRel($commenti) {
    	$i=0;
    	while ($i<count($commenti)) {
    		$this->delete($commenti[$i]);
    		$i++;
    	}
    }
    
    
}

?>
