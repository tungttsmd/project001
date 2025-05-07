<?php

include_once 'system/autoload.php';

$controller = ($_GET['controller'] ?? 'system') . "controller";
$action = $_GET['action'] ?? 'index';

$path = "controllers/$controller.php";

if (file_exists($path)) {
    $instance = new $controller();
    if (method_exists($instance, $action)) {
        $instance->$action();
    } else {
        page404();
    }
} else {
    page404();
}


