<?php

/**
 * CONFIGURATION
 *
 * @author Samet Tarim
 */
class Config {

    /**
     * e.g.: Config::get("mysql/user");
     * 
     * @param type Config Entry
     */
    public static function get($path) {

        $config = $GLOBALS["config"];
        $keys = explode("/", $path);
        
        if (is_array($keys)) {
            foreach ($keys as $key) {
                if (isset($config[$key])) {
                    $config = $config[$key];
                } else {
                    $config = null;
                }
            }
        }
        return $config;
    }

}
