<?php
class clientcontroller extends controller
{
    public function index()
    {
        $data = ClientService::make()
            ->index_search();

        $this->render('client/index', $data, 2);
    }
    public function detail()
    {
        $color = 'warning';
        $data = null;
        $msg = null;
        Clientcore::detail_idFetch($data, $msg, $color);
        $this->render('client/detail', ['msg' => $msg, 'color' => $color, 'data' => $data], 2);
    }
    public function report()
    {
        $color = 'warning';
        $msg = null;
        $data = null;
        Clientcore::report_dataSave($data, $msg, $color);
        # UX - redraw data inputed
        $this->render('client/report', ['msg' => $msg, 'color' => $color, 'data' => $data], 2);
    }
}
