<?php



/**
 * @access public
 * @package Foundation
 */







class Fdb {


    /**
     * @var PDO $db Mantiene la connessione al database
     */
     public $db;
    /**
     * @var $_connection Variabile di connessione al database
     */
    private $_connection;
    /**
     * @var $_result Variabile contenente il risultato dell'ultima query
     */
    private $_result;
    /**
     * @var $_table Variabile contenente il nome della tabella
     */
    protected $_table;
    /**
     * @var $_key Variabile contenente la chiave della tabella
     */
    protected $_key;
    /**
     * @var $_return_class Variabile contenente il tipo di classe da restituire
     */
    protected $_return_class;
    /**
     * @var $_auto_increment Variabile booleana tabella con chiave automatica o no
     */
    protected $_auto_increment=false;
    /**
     *
     * @global array $config
     */




    /**
    * Costruttore di Fdb che attiva la connessione
    */
 public function __construct()
     {  
         require_once("includes/config.inc.php");
         try{
            global $config;
            $attributi = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // collegamento al database con PDO
            $col = "mysql:host=".$config['mysql']['host']."; dbname=".$config['mysql']['database']."";
            // connessione al database con PDO
            $this->db = new PDO($col , $config['mysql']['user'], $config['mysql']['password'], $attributi);

          }
           catch(PDOException $e) {
            die("Errore durante la connessione al database!: ".$e->getMessage());
          }            
     }


public function prepare($z) { 
        return $this->db->prepare($z); 
    }  


    /**
      * Ritorna la maniglia al PDO
      * @return Ritorna la maniglia al PDO
      */
     public function getdb() {
        return $this->db;
     }



    /**
     * Chiude la connessione al database
     */
    public function close() {
        $this->db = null;
        debug('Connessione al db chiusa');
    }


/**
     * Effettua una query al database
     * @param string $query
     * @return boolean
     */
    public function query($sql) {     
  		$query=$this->db->prepare($sql);
		$this->_result=$query->execute();
		if (!$this->_result)
        	return false;
        else
            return true;
    }
	
	
 /**
     * Effettua una ricerca sul database
     *
     * @param array $parametri
     * @param string $ordinamento
     * @param string $limit
     * @return array
     */
    function search($parametri = array(), $ordinamento = '', $limit = '') {
        $filtro='';
        for ($i=0; $i<count($parametri); $i++) {
            if ($i>0) $filtro .= ' AND';
            $filtro .= ' `'.$parametri[$i][0].'` '.$parametri[$i][1].' \''.$parametri[$i][2].'\'';
        }
       $sql = 'SELECT * FROM '.$this->_table.'';
        if ($filtro != '')
            {$sql.='WHERE '.$filtro.' ';}
        if ($ordinamento!='')
            {$sql.='ORDER BY '.$ordinamento.' ';}
        if ($limit != '')
            {$sql.='LIMIT '.$limit.' ';}
		
		 $query=$this->db->prepare($sql);
	     try {
	 		$result=$query->execute();
	 		} catch (PDOException $e) {
	 		echo 'Error: '.$e->getMessage();
	 	}
	 	return $result; // return $this->getObjectArray();
	
	 }
      
    





   /**
     * Restituisce il risultato in un array associativo
     *
     * @return array
     */
    public function getResultAssoc() {
        if ($this->_result != false) {
            $numero_righe=$this->_result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $return=array();
                while ($row = fetch($this->_result)) {       //oppure fetchAll
                    $return[]=$row;
                }
                $this->_result=false;
                return $return;
            }
        }
        return false;
    }
	
	 /**
     * Restituisce il risultato della query in un array
     *
     * @return array
     */
    public function getResult() {
        if ($this->_result!=false) {
            $numero_righe=$this->_result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $row = fetchAll($this->_result);			//oppure fetchAll
                $this->_result=false;
                return $row;
            }
        }
        return false;
    }
	
	 /**
     * Restituisce un oggetto della classe Entity impostata in _return_class contentente i risultati della query
     *
     * @return mixed
     */
    public function getObject() {
	if ($this->_result!=false) {
	    $numero_righe=$this->_result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
            $row = fetchAll($this->_result,$this->_return_class);
            $this->_result=false;
            return $row;
        } 
		}else
            return false;
    }
    /**
     * Restiuisce un array di oggetti contenenti il risultato della query
     *
     * @return array
     */
    public function getObjectArray() {
	if ($this->_result!=false) {
        $numero_righe=$this->_result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
            $return=array();
            while ($row =fetchAll($this->_result,$this->_return_class)) {
                $return[]=$row;
            }
            $this->_result=false;
            return $return;
        }
		} else
            return false;
    }
	
	/**
     * Memorizza sul database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function store($object) {
        $object=$object->getAllArray(); 
    	$i=0;
        $values='';
        $fields='';
        foreach ($object as $key=>$value) {
            if (!($this->_auto_increment && $key == $this->_key) && substr($key, 0, 1)!='_') {
                if ($i==0) {
                    $fields.='`'.$key.'`';
                    $values.='\''.$value.'\'';
                } else {
                    $fields.=', `'.$key.'`';
                    $values.=', \''.$value.'\'';
                }
                $i++;
            }
        }
		
		/*if ($this->_auto_increment) {
            $query=$this->db->prepare('SELECT LAST_INSERT_ID() AS `id`'.$this->bind);
            $this->db->query($query);
            $result=$this->getResult();
            return $result['id'];
        }else {
            return $return;
        }*/
		
		if ($this->_auto_increment) {
	 		unset($data['id']);
	 	}
		$sql='INSERT INTO '.$this->_table.' ('.$fields.') VALUES ('.$values.')';
	    $query=$this->db->prepare($sql);
	     try {
	 		$query->execute();
	 		$result=$query->rowCount();
	 	} catch (PDOException $e) {
	 		echo 'Error: '.$e->getMessage();
	 	}
	 	return $result;
	
	 }

    /**
     * Carica in un oggetto lo stato dal database
     *
     * @param mixed $key
     * @return boolean
     */
    public function load($key) {
        $sql='SELECT * ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$key.'\'';
        $query=$this->db->prepare($sql);
       try {
	 		$query->execute();
	 		$result=$query->fetchAll(PDO::FETCH_ASSOC);
	 	} catch (PDOException $e) {
	 		echo 'Error: '.$e->getMessage();
	 	}
	 	return $result;
    }
    /**
     * Cancella dal database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function delete(& $object) {
        $arrayObject=$object->getAllArray();
        $sql='DELETE ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
		$query=$this->db->prepare($sql);
       try {
	 		$query->execute();
	 		$result=$query->rowCount();
	 	} catch (PDOException $e) {
	 		echo 'Error: '.$e->getMessage();
	 	}
	 	return $result;
	 }
	
    /**
     * Aggiorna sul database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function update($object) {
        $object=$object->getAllArray(); 
    	$i=0;
        $fields='';
        foreach ($object as $key=>$value) {
            if (!($key == $this->_key) && substr($key, 0, 1)!='_') {
                if ($i==0) {
                    $fields.='`'.$key.'` = \''.$value.'\'';
                } else {
                    $fields.=', `'.$key.'` = \''.$value.'\'';
                }
                $i++;
            }
        }
        $sql='UPDATE `'.$this->_table.'` SET '.$fields.' WHERE `'.$this->_key.'` = \''.$object[$this->_key].'\'';
		$query=$this->db->prepare($sql);
       try {
	 		$query->execute();
	 		$result=$query->rowCount();
	 	} catch (PDOException $e) {
	 		echo 'Error: '.$e->getMessage();
	 	}
	 	return $result;
	 }
   
}

?>
