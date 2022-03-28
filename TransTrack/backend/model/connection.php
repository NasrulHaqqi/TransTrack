<?php

class Connection {
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "transtrack";

    function connect() {
        $this->db = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if ($this->db) {
            return $this->db;
        }
        echo "cannot connect to database | " . $this->db->error;
        return null;
    }
}
