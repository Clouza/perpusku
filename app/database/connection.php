<?php

namespace App\Database;

use mysqli;

class Connection
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "perpusAdmin";
        $password = "admin";
        $database = "perpusku";

        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function login(string $username, string $password)
    {
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        return $this->conn->query($sql);
    }
}
