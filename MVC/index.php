<?php

include_once 'controllers/controller.php'; # <--- include vào, chưa include sẽ lỗi không tìm thấy file controller.php để kế thừa

$controller = ($_GET['controller'] ?? 'system') . "controller";
$action = $_GET['action'] ?? 'index';

$path = "controllers/$controller.php";

if (file_exists($path)) {
    include_once $path;
    $instance = new $controller();
    if (method_exists($instance, $action)) {
        $instance->$action();
    } else {
        page404(); 
    }
} else {
    page404();
}

function page404()
{
    include_once 'controllers/systemcontroller.php';
    $instance = new systemcontroller();
    $instance->_404();
}
