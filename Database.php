<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'ifoa_pratica_s5_l5';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Connessione al database fallita: " . $e->getMessage();
            return null;
        }
    }
}
?>