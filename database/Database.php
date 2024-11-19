<?php
namespace Database;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $db_name = "studentdb";
    private $username = "root";
    private $password = "";
    private $database = "studentdb";

    public $connect;

    public function getConnection() {
        $this->connect = null;
    
        try {
            // Correctly assign the connection to the class property
            $this->connect = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    
        return $this->connect;
    }
}
?>