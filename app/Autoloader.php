<?php

namespace App;

/**
 * Class Autoloader
 * @package App
 */
class Autoloader {

    /**
     * Registers autoloader
     */
    static function autoload_register() {
        //__CLASS__ holds the current class name
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @param $class string name of class to be loaded
     */
    static function autoload($class) {
        if(strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}