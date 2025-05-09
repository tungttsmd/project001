<?php
class admincontroller extends controller
{
    public function index()
    {
        $this->render('admin/index', [], 1);
    }
    public function list()
    {
        $data = oopstd([]);
        Admincore::list_fetchAll($data);
        $this->render('admin/list', ['data' => $data], 1);
    }
    public function record()
    {
        Admincore::record_update();
    }
    public function edit()
    {
        $data = null;
        $msg = null;
        $color = 'warning';
        Admincore::edit_updateRecord($data, $msg, $color);
        $this->render('admin/edit', ['data' => $data, 'msg' => $msg, 'color' => $color], 1);
    }
    public function detail()
    {
        $msg = null;
        $color = 'warning';
        $data = null;
        Admincore::detail_recordFetch($data, $msg, $color);
        $this->render('admin/detail', ['msg' => $msg, 'color' => $color, 'data' => $data], 1);
    }
    public function report()
    {
        $color = 'warning';
        $msg = null;
        $data = null;
        Clientcore::report_dataSave($data, $msg, $color);
        # UX - redraw data inputed
        $this->render('client/report', ['msg' => $msg, 'color' => $color, 'data' => $data], 1);
    }
    public function search()
    {
        $list = oopstd([]);
        $html = oopstd([]);
        Clientcore::index_listDraw($list, $html);
        $this->render('client/index', ['data' => $list, 'html' => $html], 1);
    }
}
