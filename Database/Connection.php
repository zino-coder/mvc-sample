<?php

class Connection
{
    private $conn;

    public function getBdd() {
        if (!$this->conn) {
            $this->conn = new PDO('mysql:host=localhost;dbname=mvc', 'root', '12345678');
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }

        return $this->conn;
    }
}