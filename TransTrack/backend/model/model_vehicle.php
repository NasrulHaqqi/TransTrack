<?php
include_once 'connection.php';

class Vehicle {

    public $table = "vehicle";
    public $no = "";
    public $jenis = "";
    public $merek = "";
    public $tahun = "";

    public function __construct() {
        $this->db = new Connection();
        $this->db = $this->db->connect();
    }

    public function create($no, $jenis, $merek, $tahun) {
        $sql = "INSERT INTO " . $this->table . " (no, jenis, merek, tahun) VALUES ('" . $no . "' , '" . $jenis . "' , '" . $merek . "' , '" . $tahun . "')";
        $result = $this->db->query($sql);
        if ($result) {
            return "create success";
        } else {
            return "create error | " . $this->db->error;
        }
    }

    public function read($id) {
        $sql = "SELECT * FROM " . $this->table . (isset($id) ? " WHERE id = " . $id . "" : "");
        $result = $this->db->query($sql);
        $results = [];
        while ($array = mysqli_fetch_assoc($result)) {
            $results[] = $array;
        }
        return $results;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id . "";
        $result = $this->db->query($sql);
        if ($result) {
            return "delete success";
        } else {
            return "delete error | " . $this->db->error;
        }
    }

    public function update($id, $no, $jenis, $merek, $tahun) {
        $sql = "UPDATE " . $this->table . " SET no = '" . $no . "', jenis = '" . $jenis . "', merek = '" . $merek . "', tahun = '" .$tahun . "' WHERE id = " . $id . "";
        $result = $this->db->query($sql);
        if ($result) {
            return "update success";
        } else {
            return "update error | " . $this->db->error;
        }
    }
}
