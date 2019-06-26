<?php

/**
 * PHP Scaffolding by prod3v3loper
 * 
 * @see 
 */
class GGX extends GenGiX {

    /**
     * Answer collector
     */
    public static $answers = array(
        "",
        0,
        "newsletter"
    );

    /**
     * Answer collector
     */
    public static $projectpath = "";

    /**
     * Output the welcome
     * 
     */
    public static function info($text = "") {

        $string = "\n" . $text . "\n";
        $string .= "\nYour PHP Version: " . phpversion() . "\n";
        echo $string . "\n";
    }

    /**
     * Loop the questions and collect the answers
     * 
     */
    public static function questions(array $args = array()) {

        $i = 0;
        foreach ($args as $arg) {
            echo $arg . ' ';
            $stdin = fopen('php://stdin', 'r');
            $stget = trim(fgets($stdin));
            if ($stget) {
                self::$answers[$i] = $stget;
            }
            // if ( $answer == 'yes') {
            //     // handle...
            // }
            fclose($stdin);
            $i++;
        }

        echo "\n\nInstallation complete!\n\n";
    }

    /**
     * Create the project folder structure
     * 
     */
    public function create() {

        // First
        $firstfolder = (self::$answers[0] ? self::$answers[0] . "/" : "");
        if (!file_exists($firstfolder)) {
            mkdir($firstfolder);
        } else {
            self::$errors[] = "Folder exists " . $firstfolder;
        }
        // Second
        $secondfolder = $firstfolder . (self::$answers[1] ? self::$answers[1] . "/" : date("Y") . "/");
        if (!file_exists($secondfolder) || !file_exists($firstfolder . date("Y") . "/")) {
            mkdir($secondfolder);
        } else {
            self::$errors[] = "Folder exists " . $secondfolder;
        }
        // Third
        self::$projectpath = $secondfolder . (self::$answers[2] ? self::$answers[2] . "/" : "");
        if (!file_exists(self::$projectpath)) {
            mkdir(self::$projectpath);
        } else {
            self::$errors[] = "Folder exists " . self::$projectpath;
        }
    }

    /**
     * 
     */
    public static function xcopy($src = "", $to = "") { 

        $src = $src ? $src : dirname(__DIR__) . '/templates/';
        $to = $to ? $to : self::$projectpath;

        $dir = opendir($src); 
        if ($to && !file_exists($to)) {
            mkdir($to); 
        }
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    self::xcopy($src . '/' . $file, $to . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file, $to . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    }
}