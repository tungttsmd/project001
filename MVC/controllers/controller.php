<?php

/*** 3.1 Class này có vai trò chứa toàn bộ action chung của các controller ***/
/*** 3.2 Tạo action render và dán nội dung tương tự trong action của systemcontroller vừa rồi ***/
/*** 3.3 Thêm tham số $render_view, $render_layout và $render_data vào và gán vào nội dung để include linh động hơn ***/
/*** 3.4 Gán tham số vào nội dung vị trí thích hợp ***/
/*** 3.5 Ép kiểu $render_data = [] là array để extract() và Ép kiểu string layout = '1' mặc định để dùng layout-1.php mặc định ***/
/*** 3.6 Extract $render_data (mảng có key => value) ***/
/*** 3.7 Ứng dụng $render_data trong views (dữ liệu frontend) ***/
/*** 3.8 Cho các controller khác kế thừa class controller ***/
# Di chuyển qua systemcontroller.php làm ví dụ
class controller
{
    public function render(string $render_view, array $render_data = [], string $render_layout = '1')
    {
        extract($render_data);
        $view = "views/$render_view.php";
        include "views/layouts/layout-$render_layout.php";
    }
}
