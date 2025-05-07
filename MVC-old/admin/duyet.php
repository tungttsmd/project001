<?php
include 'libs/lib.php';
include 'middleware/Mi.php';
include 'system/config/config.php';
include 'system/database/DBConnection.php';
include 'system/database/DBQuery.php';
include 'system/database/DBEscape.php';
include 'system/database/DBStatement.php';
include 'system/database/DBCRUD.php';
include 'data/Admin.php';
$model = new Admin();
$_POST['result'] = $model->duyetScammer($_GET['id'], $_GET['mode'], $msg, $color);
$_SESSION['msg'] = $msg;
$_SESSION['color'] = $color;
