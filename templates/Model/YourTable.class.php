<?php

//namespace Model;

/**
 * MODAL
 * 
 * This is the model of this acts all the traffic from the db.
 * This class should look like the table in the database. If there are more tables to be then mus for the other table to create its own class.
 *
 * @author      Samet Tarim
 * @copyright   (c) 2019, Samet Tarim
 * @link        https://www.prod3v3loper.com
 * @package     melabuai
 * @subpackage  mvc
 * @version     1.0
 * @since       1.0
 */
class YourTable {

    /**
     * We could also define our attributes without value, but it is clear for another which type (string, integer etc.) is provided.
     */
    private $title = "", $description = "", $content = "", $created = 0;
    
    /* MAGIC METHODS *//////////////////////////////////////////////////////////
    
    /**
     * 
     * @param type $data array
     */
    public function __construct($data = array()) {
        
        // Set by array
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $setter = "set" . ucfirst($key);
                if (method_exists($this, $setter)) {
                    $this->$setter($value);
                }
            }
        }
    }

    /* GETTER */////////////////////////////////////////////////////////////////
    
    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getContent() {
        return $this->content;
    }

    function getCreated() {
        return $this->created;
    }

    /* SETTER */////////////////////////////////////////////////////////////////
    
    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    /* DATABASE *///////////////////////////////////////////////////////////////

    /**
     * Get all from DB
     * 
     * @return \Kaffe
     */
    public static function getAll() {

        $data = DB::instance()->exec("SELECT * FROM YourTable");
        $result = array();
        if ($data) {
            foreach ($data as $row) {
                $result[] = new YourTable($row);
            }
        }
        return $result;
    }

    /**
     * Get one from DB
     * 
     * @param type $id
     * @return \Kaffe
     */
    public static function getOne($id) {
        
        $query = DB::instance()->exec("SELECT * FROM YourTable WHERE ID = ? LIMIT 1", array($id));
        if ($query) {
            $instance = new YourTable($query[0]);
        }
        return $instance;
    }

}
