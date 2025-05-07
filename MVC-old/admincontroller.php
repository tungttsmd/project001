<?php
class admincontroller extends controller
{
    public function index()
    {

        $this->render('admin/index', ['pageTitle' => 'Trang chủ']);
    }
    public function list()
    {
        $list = new Admin();
        $this->render('admin/list',  ["data" => $list->scammerList()]);
    }
    public function tocao()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['button']) && $_POST['button'] === 'submit-scammers-baocao' && isset($_POST['anti-reload'])) {

            $this->tocaopost();
        }

        $this->render('scammers/baocao', ['pageTitle' => 'Tố cáo']);
    }

    public function tocaopost()
    {
        $model = new ScamChecker();
        $form_submit = new DoiTuong(
            $_POST['account_name'],
            $_POST['account_number'],
            $_POST['account_bank'],
            $_POST['account_facebook'],
            $_POST['account_note'],

        );
        $list = new ScamChecker();
        $list->baocao($form_submit);
        $msg = ['msg' => "Tố cáo thành công", 'color' => 'success'];
        $this->render('scammers/baocao',  $msg, [], 1);
        return;
    }
    public function kiemtra()
    {
        $_POST['button'] = $_POST['button'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['button'] === 'submit-scammers-kiemtra') {
            $model = new ScamChecker();
            $form_submit = new DoiTuong($_POST['box-kiemtra']);
            $data = $model->kiemTraTen($form_submit)['data']['query'];
        }
        $this->render('scammers/kiemtra', $data);
    }
}
