<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "manajemen_risiko";
    private $conn;

    // Constructor untuk membuat koneksi
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method untuk mendapatkan koneksi
    public function getConnection()
    {
        return $this->conn;
    }
}
