<?php
include_once 'connection.php';

class Migration {
    public function __construct() {
        $this->db = new Connection();
        $this->db = $this->db->connect();
    }
    public function admin() {
    }
    public function vehicle() {
    }
    public function sparepart() {
    }
    public function reset() {
    }
    public function mulai() {
        $this->reset();
        $this->admin();
        $this->vehicle();
        $this->sparepart();
    }
}

$migrate = new Migration();
$migrate->mulai();
