<?php
class admincontroller
{
//     public function index()
//     {
//         $folder = $_GET['folder'] ?? '';
//         $file = $_GET['file'] ?? '';
//         if ($file !== 'duyet') {
//             // Tổ chức thư mục psuedo MVC: users -> index -> layout pages -> pages -> data (bla bla xyz) -> layout pages -> pages -> index -> users

//             $path = "pages/$folder/$file.php";
//             $home = "pages/scammers/kiemtra.php";
//             $_404 = "pages/system/404.php";
//             $layout = '0';

//             if (empty($folder) || empty($file)) {
//                 $path = $home;
//             } elseif (!file_exists($path)) {
//                 $path = $_404;
//                 $layout = 'empty';
//             } elseif ($folder === 'admin') {
//                 $layout = 'admin';
//             }
//             include "pages/layouts/layout-$layout.php";
//             unset($_SESSION['msg'],);
//         } else {
//             include "pages/admin/duyet.php";
//             header("location: http://localhost/001/?folder=admin&file=list");
//             exit;
//         }
//     }
//     public function list()
//     {
//         include 'libs/lib.php';
//         include 'middleware/Mi.php';
//         include 'system/config/config.php';
//         include 'system/database/DBConnection.php';
//         include 'system/database/DBQuery.php';
//         include 'system/database/DBEscape.php';
//         include 'system/database/DBStatement.php';
//         include 'system/database/DBCRUD.php';
//         include 'data/Admin.php';

//         if (isset($_GET['id'])) {
//             $admin = new Admin();
//             $color = 'success';
//             $msg = 'Chấp nhận báo cáo thành công';
//             $admin->duyetScammer($_GET['id'], 1, $msg, $color);
//             var_dump('alo');
//         }

//         $model = new Admin();
//         $_POST['result'] = $model->scammerList();

//         include 'pages/admin/list.php';
//     }
// }
