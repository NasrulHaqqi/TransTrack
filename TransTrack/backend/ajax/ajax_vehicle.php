<?php
include '../model/model_vehicle.php';
$M_vehicle = new Vehicle();

function vehicle_add() {
    global $M_vehicle;
    global $data;
    $data = array_chunk($data, sizeof($data))[0];
    $result = $M_vehicle->create($data[0], $data[1], $data[2], $data[3]);
    echo json_encode($result);
}
function vehicle_detil() {
    global $M_vehicle;
    global $id;
    $result = $M_vehicle->read($id);
    echo json_encode($result);
}
function vehicle_view() {
    global $M_vehicle;
    global $id;
    $result = $M_vehicle->read($id);
    echo json_encode($result);
}
function vehicle_edit() {
    global $M_vehicle;
    global $data;
    $data = array_chunk($data, sizeof($data))[0];
    $result = $M_vehicle->update($data[0], $data[1], $data[2], $data[3], $data[4]);
    echo json_encode($result);
}
function vehicle_delete() {
    global $M_vehicle;
    global $id;
    $result = $M_vehicle->delete($id);
    echo json_encode($result);
}
