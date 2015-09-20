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
           
     }
     
     public function connessione() {
     	require_once("includes/config.inc.php");
     	try{
     		global $config;
     		 $attributi = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     		 // collegamento al database con PDO
     		 $col = "mysql:host=".$config['mysql']['host']."; dbname=".$config['mysql']['database']."";
     		 // connessione al database con PDO
     		 $this->db = new PDO($col , $config['mysql']['user'], $config['mysql']['password'], $attributi);
     		 //$this->db=new PDO("mysql:host=localhost;dbname=softair;","root","pwmysql");
     		 
     	}
     	catch(PDOException $e) {
     		die("Errore durante la connessione al database!: ".$e->getMessage());
     	}
     	
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
    public function query($query) {
    	//$this->db=new PDO("mysql:host=localhost;dbname=softair;","root","pwmysql");
    	$q=$this->db->prepare($query);
    	$q->execute();
    	$this->_result=$q;
    	//$this->_result= $q->fetchAll();
        //$this->_result=mysql_query($query);
        debug($query);
        debug(mysql_error());
        if (!$this->_result)
        	return false;
        else
            return true;
    }
    /**
     * Restituisce il risultato in un array associativo
     *
     * @return array
     */
    public function getResultAssoc() {
    	$result=$this->_result;
    	if ($result!= false) {
            $numero_righe=$result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $return=array();
                //while ($row = mysql_fetch_assoc($this->_result)) {
               while ( $row = $result->fetch(PDO::FETCH_ASSOC)){
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
    	$result=$this->_result;
    	if ($result!=false) {
            $numero_righe=$result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
            	$row = $result->fetch(PDO::FETCH_ASSOC);
                //$row = mysql_fetch_assoc($this->_result);
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
        $result=$this->_result;
    	$numero_righe=$result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
        	$row = $result->fetchObject($this->_return_class);
            $this->_result=false;
            return $row;
        } else
            return false;
    }
    /**
     * Restiuisce un array di oggetti contenenti il risultato della query
     *
     * @return array
     */
    public function getObjectArray() {
    	$result=$this->_result;
        $numero_righe=$result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
            $return=array();
            $return=$result->fetchAll(PDO::FETCH_CLASS, "$this->_return_class");
            $this->_result=false;
            return $return;
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
        $query='INSERT INTO '.$this->_table.' ('.$fields.') VALUES ('.$values.')';
        $return = $this->query($query);
        if ($this->_auto_increment) {
            $query='SELECT LAST_INSERT_ID() AS `id`';
            $this->query($query);
            $result=$this->getResult();
            return $result['id'];
        } else {
            return $return;
        }
    }
    /**
     * Carica in un oggetto lo stato dal database
     *
     * @param mixed $key
     * @return boolean
     */
    public function load($key) {
        $query='SELECT * ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$key.'\'';
        $this->query($query);
        return $this->getObject();
    }
    /**
     * Cancella dal database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function delete(& $object) {
        $arrayObject=$object->getAllArray();
        $query='DELETE ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        unset($object);
        return $this->query($query);
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
        $query='UPDATE `'.$this->_table.'` SET '.$fields.' WHERE `'.$this->_key.'` = \''.$object[$this->_key].'\'';
        return $this->query($query);
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
        $query='SELECT * ' .
                'FROM `'.$this->_table.'` ';
        if ($filtro != '')
            $query.='WHERE '.$filtro.' ';
        if ($ordinamento!='')
            $query.='ORDER BY '.$ordinamento.' ';
        if ($limit != '')
            $query.='LIMIT '.$limit.' ';
        $this->query($query);
        return $this->getObjectArray();
    }
}

?>