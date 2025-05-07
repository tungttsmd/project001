<?php
# init_set
ini_set('display_errors', 'on');  // Ẩn/hiện lỗi với user
ini_set('log_errors', '1');  // Bật ghi lỗi
ini_set('error_log', 'db_errors.log'); // Path file lỗi

# define constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', '001');
define('CONFIG_TIME_ZONE', 'Asia/Ho_Chi_Minh');
define('DOMAIN', 'http://localhost/001/MVC/');
# timezone
date_default_timezone_set(CONFIG_TIME_ZONE); // Đặt múi giờ VN
