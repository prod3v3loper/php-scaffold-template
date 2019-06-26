<?php

// If you use namespaces here Controller then the class starts differently and not also Controller but for example router
//namespace Controller;

/**
 * CONTROLLER
 * 
 * This is the controller that controls the input, which means in this case the GET parameter p and decides accordingly which template is selected.
 *
 * @author      Samet Tarim
 * @copyright   (c) 2019, Samet Tarim
 * @link        https://www.prod3v3loper.com
 * @package     melabuai
 * @subpackage  mvc
 * @version     1.0
 * @since       1.0
 */
class Controller {

    /**
     * e.g.: Controller::display();
     * 
     * @param type $page
     */
    public static function run($page = null) {
        
        if (is_null($page)) {
            // Get the page param
            $page = filter_input(INPUT_GET, 'p');
            // if no page selected then load home templates
            if (!$page) {
                $tpls = array('header', 'nav', 'home', 'footer');
            }
            // Otherwise load defaults and page template
            else {
                $tpls = array('header', 'nav', $page, 'footer');
            }
        } else {
            // Defaults
            $tpls = array($page);
        }
        
        // Page about get data from database
        // Create table first
//        if ($page == "about") {
//            $myTable = new YourTable();
//            $myAbout = $myTable->getAll();
//            // We add context to use in our templates with $data["myAbout"]
//            View::addContext("myAbout", $myAbout);
//        }
        
        View::addContext("image", PROJECT_HTTP_ROOT . DIRECTORY_SEPARATOR . "core/img/home.jpg");
        
        View::loadTemplate($tpls);
    }

}
