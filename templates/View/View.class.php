<?php

// If you use namespaces here View then the class starts differently and not also View but for example FrontView
//namespace View;

/**
 * VIEW
 * 
 * The view is responsible for outputting the templates and passing the data to the template that comes from the model
 *
 * @author      Samet Tarim
 * @copyright   (c) 2019, Samet Tarim
 * @link        https://www.prod3v3loper.com
 * @package     melabuai
 * @subpackage  mvc
 * @version     1.0
 * @since       1.0
 */
class View {
    
    /**
     * @var type array
     */
    public static $context = array();

    /**
     * @var type string
     */
    private static $tplPath = PROJECT_DOCUMENT_ROOT . DIRECTORY_SEPARATOR . "core/tpl";

    /**
     * Add new context
     * 
     * @param type $key string
     * @param type $value string|array
     */
    public static function addContext($key, $value) {

        self::$context[$key] = $value;
    }
    
    /**
     * Returns context
     * 
     * @return type array
     */
    public static function getContext() {

        return self::$context;
    }

    /**
     * Load Template
     * 
     * @param type array
     */
    public static function loadTemplate(array $templates = array()) {

        self::addContext('templates', $templates);
        self::addContext('siteurl', PROJECT_HTTP_ROOT);
        
        // Extract to use in default.tpl.php
        extract(array('data' => self::getContext()));

        // Load default template and inside the other templates
        require_once self::$tplPath . DIRECTORY_SEPARATOR . 'default.tpl.php';
    }

}
