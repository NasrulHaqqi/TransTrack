<?php
include_once 'connection.php';

class Sparepart {

    public $table = "sparepart";
    public $jenis = "";
    public $nama = "";
    public $jumlah = "";

    public function __construct() {
        $this->db = new Connection();
        $this->db = $this->db->connect();
    }

    public function create($jenis, $nama, $jumlah) {
        $sql = "INSERT INTO " . $this->table . " (jenis, nama, jumlah) VALUES ('" . $jenis . "' , '" . $nama . "' , '" . $jumlah . "')";
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

    public function update($id, $jenis, $nama, $jumlah) {
        $sql = "UPDATE " . $this->table . " SET jenis = '" . $jenis . "', nama = '" . $nama . "', jumlah = '" .$jumlah . "' WHERE id = " . $id . "";
        $result = $this->db->query($sql);
        if ($result) {
            return "update success";
        } else {
            return "update error | " . $this->db->error;
        }
    }
}
