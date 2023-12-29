<?php

class database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'oop';

    private $conn = false;
    private $mysqli = "";

    public function __construct()
    {
        if ($this->conn == false) {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                die('error in db connection');
                return false;
            } else {
                return true;
            }
        }
    } // construct ends

    public function prepare($query)
    {
        return $this->mysqli->prepare($query);
    }
}
