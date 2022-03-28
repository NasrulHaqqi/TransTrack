<?php

$resource = isset($_GET['resource']) ? $_GET['resource'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$function = $resource . "_" . $action;
include './ajax_' . $resource . '.php';

// ajax.php?resource=[RES]&action=[ACT]&id=[ID]

if (function_exists($function)) {
    $function();
} else {
    echo "function not found";
}
