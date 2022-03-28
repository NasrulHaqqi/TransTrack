<?php
include '../model/model_admin.php';
$M_admin = new Admin();

function admin_login() {
    global $M_admin;
    global $data;
    $data = array_chunk($data, sizeof($data))[0];
    $result = $M_admin->login($data[0], $data[1]);
    if ($result) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['logged_in'] = $data[0];
            echo json_encode("login success");
        } else {
            echo json_encode("login error");
        }
    } else {
        echo json_encode("login error");
    }
    exit();
}
function admin_logout() {
    session_start();
    if ($_SESSION['logged_in']) {
        unset($_SESSION['logged_in']);
        if (session_destroy()) {
            echo json_encode("logout success");
        } else {
            echo json_encode("logout error");
        }
    } else {
        echo json_encode("not logged in");
    }
    exit();
}