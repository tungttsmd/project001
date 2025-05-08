<?php
# include file non class
include_once 'libs/lib.php';
include_once 'system/config/config.php';
include_once 'core/core.php';

# autoload class -0.5 flow
/* Bất kì khi nào php nhận thấy một cái tên class chưa được định nghĩa (kể cả new class(), static call, 
 * extenđ, function (classname)... autoload đều
 * Chạy hàm anonymous dưới đây và return tên class vào tham số đầu tiên của anonymous function đó
 */
spl_autoload_register(function ($classNameWillBeReturnedHere) {
    $className = $classNameWillBeReturnedHere;

    // Start from index.php
    $path_controllers = "controllers/$className.php";
    $path_models = "models/$className.php";
    $path_database = "system/database/$className.php";
    $path_core = "core/$className.php";

    if (file_exists($path_controllers)) {
        include $path_controllers;
    };
    if (file_exists($path_models)) {
        include $path_models;
    };
    if (file_exists($path_database)) {
        include $path_database;
    };
    if (file_exists($path_core)) {
        include $path_core;
    };
});
