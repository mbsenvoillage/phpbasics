<?php


namespace App\Table;

use App\App;
class Table
{

    protected static $table;

    private static function getTable() {
        if(static::$table === null) {
            //get_called_class() returns the caller class, not the current class
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)) . 's';
        }
        // static references the calling class, self references the current class
        return static::$table;

    }

    public static function find($id) {
        return App::getDb()->prepare(
            "select * from " . static::getTable() . " where " . static::getTable() . "_id = ?",
            [$id], get_called_class()
        );
    }

    public static function all() {
        $table_name = static::getTable();
        $calling_class = get_called_class();
        return App::getDb()->query("select * from " . $table_name . "" , $calling_class);
    }

    // Instead of calling the Article class functions directly in the templates or views
    // we use the __get method which translates a key into a method
    public function __get($keyOfFunc) {
        // ucFirst returns a string with its first letter capitalized
        $method = 'get' . ucfirst($keyOfFunc);
        $this->$keyOfFunc = $this->$method();

        // Same behavior as JS, func name is just a placeholder for code to execute
        return $this->$keyOfFunc;
    }

}