<?php

/**
 * DATABASE
 *
 * @author Samet Tarim
 */
class DB {

    /**
     * Instanz
     * 
     * @var type 
     */
    private static $instance_ = null;

    /**
     * PDO
     * 
     * @var type 
     */
    private $pdo, $stmt;
    
    /* MAGIC METHODS *//////////////////////////////////////////////////////////

    /**
     *  Konstruktor
     */
    private function __construct() {
        
        $dns    = Config::get("mysql/driver") . ":host=" . Config::get("mysql/host") . ":" . Config::get("mysql/port") . ";dbname=" . Config::get("mysql/dbname");
        $user   = Config::get("mysql/user");
        $pass   = Config::get("mysql/pass");
        $opt    = Config::get("mysql/opt");
        
        try {
            $this->pdo = new PDO($dns, $user, $pass, $opt);
        } catch (PDOException $ex) {
            echo 'PDOException<br>';
            die($ex->getMessage());
        }
    }
    
    /* METHODS *////////////////////////////////////////////////////////////////
    
    /**
     * Instance
     * 
     * @return type Instanz
     */
    public static function instance() {
        
        if (!isset(self::$instance_)) {
            self::$instance_ = new DB();
        }
        
        return self::$instance_;
    }
    
    /**
     * 
     * @param type $query
     * @param type $data
     * @return type Object
     */
    public function exec($query, array $data = array()) {
        
        $this->stmt = $this->pdo->prepare($query);
        if (!$this->stmt->execute($data)) {
            die($this->pdo - $this->pdo->errorInfo());
        }
        
        return $this->stmt->fetchAll();
    }
}
