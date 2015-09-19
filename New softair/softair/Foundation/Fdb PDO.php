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
    public function query($query) {



//$this->db->exec() or die(print_r($db->errorInfo(), true));




            global $config;

            $attributi = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // collegamento al database con PDO
            $col = "mysql:host=".$config['mysql']['host']."; dbname=".$config['mysql']['database']."";
            $this->db = new PDO($col , $config['mysql']['user'], $config['mysql']['password'], $attributi);

   $query=$this->db->prepare("INSERT INTO ".$this->_table."\n".$this->_key." VALUES ");
        try {
            $result = $query->execute();
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
        return $result;







      /*  $query='DELETE FROM utente WHERE 1 =1 '
        $db->exec($query);
        debug($query);
        if (!$this->_result)
            return false;
        else
            return true;

*/






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
       // return $this->getObjectArray();
    }












   /**
     * Restituisce il risultato in un array associativo
     *
     * @return array
     */
    public function getResultAssoc() {
        if ($this->_result != false) {
            $numero_righe=mysql_num_rows($this->_result);
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $return=array();
                while ($row = mysql_fetch_assoc($this->_result)) {
                    $return[]=$row;
                }
                $this->_result=false;
                return $return;
            }
        }
        return false;
    }



































}

?>
