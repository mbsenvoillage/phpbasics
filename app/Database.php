<?php

namespace App;

use \PDO;

class Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = "root", $db_pass = "root", $db_host = "localhost")
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getConnection() {

        // If there isn't any instance of database, instantiate it, otherwise return the instance
        if($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root');
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }


    // PDO::FETCH_CLASS: Returns instances of the specified class, mapping the columns of each row to named properties in the class.
    public function query($statement, $class_name) {
        $req = $this->getConnection()->query($statement);
        $data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $data;
    }

    // prepare method of PDO takes a statement, and an array of variables which replaces the placeholders in the prepared statement
    public function prepare($statement, $attributes, $class_name, $one = false) {
        $req = $this->getConnection()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }
}