<?php
include '../model/model_sparepart.php';
$M_sparepart = new Sparepart();

function sparepart_add() {
    global $M_sparepart;
    global $data;
    $data = array_chunk($data, sizeof($data))[0];
    $result = $M_sparepart->create($data[0], $data[1], $data[2], $data[3]);
    echo json_encode($result);
}
function sparepart_detil() {
    global $M_sparepart;
    global $id;
    $result = $M_sparepart->read($id);
    echo json_encode($result);
}
function sparepart_view() {
    global $M_sparepart;
    global $id;
    $result = $M_sparepart->read($id);
    echo json_encode($result);
}
function sparepart_edit() {
    global $M_sparepart;
    global $data;
    $data = array_chunk($data, sizeof($data))[0];
    $result = $M_sparepart->update($data[0], $data[1], $data[2], $data[3], $data[4]);
    echo json_encode($result);
}
function sparepart_delete() {
    global $M_sparepart;
    global $id;
    $result = $M_sparepart->delete($id);
    echo json_encode($result);
}
