<?php
$controllername = $_GET['controller'] ?? 'systemcontroller';
$action = $_GET['action'] ?? 'index';

$flag = true;

# Case module: không nhập query string hoặc thiếu
if ($flag && empty($controllername) || empty($action)) {
    $flag = false;
}
# Case module: query string không đưa tới đâu cả
if ($flag && !file_exists('controllers/' . $controllername . '.php')) {
    $flag = false;
}

# Kết quả: trả về trang 404
if (!$flag) {
    $controllername = "systemcontroller";
    $action = "_404";
}

include 'controllers/' . $controllername . '.php';

$controller = new $controllername();
$controller->$action();
