<?php

class User
{
    private $db;
    public function __construct(database $db)
    {
        $this->db = $db;
    }
    public function login($table, $email, $password)
    {
        $qry = "SELECT * FROM `$table` WHERE `email` = ? AND `password` = ?";
        $stmt = $this->db->prepare($qry);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            echo "no user found";
        }
    }
}
