<?php
class systemcontroller extends controller
{
    public function index()
    {
        $this->render('index', ['content' => 'Xin chào Lệ rơi', 'alert' => 'Tuyệt cú mèo']);
    }
    public function _404()
    {
        $this->render('_404', [], '0');
    }
}
