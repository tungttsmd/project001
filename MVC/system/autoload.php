<?php
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

    if (file_exists($path_controllers)) {
        include $path_controllers;
    };
    if (file_exists($path_models)) {
        include $path_models;
    };
});
