<?php
include_once 'connection.php';

class Admin {

    public $table = "admin";

    public function __construct() {
        $this->db = new Connection();
        $this->db = $this->db->connect();
    }

    public function login($username, $password){
        $sql = "SELECT * FROM " . $this->table . " WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($sql);
        $results = [];
        if($result){
            while ($array = mysqli_fetch_assoc($result)) {
                $results[] = $array;
            }
        }
        return $results;
    }
}
