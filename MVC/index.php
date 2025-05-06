<?php
$controllername = $_GET['controller'] ?? 'systemcontroller';
$action = $_GET['action'] ?? 'index';

$flag = true;
$msg = '';

# Case module: nhập query string thiếu
if ($flag && (empty($controllername) || empty($action))) {
    $flag = false;
    $msg = "Query string không đầy đủ";
}

# Case module: query string controller không tồn tại, không đưa tới đâu cả
if ($flag && !file_exists('controllers/' . $controllername . '.php')) {
    $flag = false;
    $msg = "Controller không tồn tại";
}

# Case module: query string action đưa controller tới action không tồn tại
if ($flag && file_exists("controllers/$controllername.php")) {
    include_once "controllers/$controllername.php";
    if (!method_exists($controllername, $action)) {
        $flag = false;
        $msg = "Action không tồn tại";
    }
}

# Kết quả: trả về trang 404
if (!$flag) {
    $controllername = "systemcontroller";
    $action = "_404";
}

include_once "controllers/$controllername.php";

$controller = new $controllername();
$controller->$action();
