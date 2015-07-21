<?php
**
 * @access public
 * @package Foundation
 *//



class Fdb {
    /**
      * @var PDO $db Mantiene la connessione al database
     */
    protected $db; 
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
            $db = new PDO($col , $config['mysql']['user'], $config['mysql']['password'], $attributi);

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
        $db = null;
        debug('Connessione al db chiusa');
    }






//controllare funzionamento
    /**
     * Cancella dal database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function delete(& $object) {

        $arrayObject=get_object_vars($object);
        $sql = "DELETE FROM ".$this->table." WHERE ".$this->keydb[0]."=".$this->bind[0];
        $query='DELETE ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        unset($object);
        return $this->query($query);

    }

//controllare funzionamento
    /**
     * Aggiorna sul database lo stato di un oggetto
     *
     * @param object $object
     * @return boolean
     */
    public function update($object) {
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
        $arrayObject=get_object_vars($object);
        $query='UPDATE `'.$this->_table.'` SET '.$fields.' WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        return $this->query($query);
    }








// eseguire query
// http://www.miniscript.it/articoli/67/pdo_eseguire_le_query.html
// http://www.mrwebmaster.it/php/aggiornamento-cancellazione-record-pdo_11900.html
// http://www.targetweb.it/primi-passi-con-pdo-inserimento-dati-nel-database-con-i-bind-param/






























//controllare funzionamento
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
