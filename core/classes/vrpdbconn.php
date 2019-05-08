<?php
/**
 * Created by PhpStorm.
 * user: Sling
 * Date: 13-08-2018
 * Time: 10:45
 */

class vrpdbconn
{
    protected $db;

    function __construct()
    {
        $host = 'localhost';
        $db   = 'vrp';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
        }catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    public function open() {
        if(!$this->db) {
            new vrpdbconn();
        }
        return $this->db;
    }

    public function close() {
        $this->db = null;
    }

}