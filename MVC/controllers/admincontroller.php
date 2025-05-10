<?php
class admincontroller extends controller
{
    public function index()
    {
        $this->render('admin/index', [], 1);
    }
    public function list()
    {
        $data = AdminService::make()
            ->list();

        $this->render('admin/list',  $data, 1);
    }
    public function record()
    {
        AdminService::make()
            ->valid(isset($_GET['use'], $_GET['id']) && in_array($_GET['use'], ['accept', 'reject', 'wait']))
            ->update_isConfirm($_GET['id'], $_GET['use']);

        $this->header('admin', 'list');
    }
    public function detail()
    {

        $response = oopstd(AdminService::make()
            ->detail_getByID());

        if ($response->flag) {
            $data = [
                'msg' => $response->data->data->message,
                'color' => $response->data->data->color,
                'data' => $response->data->data->result
            ];
            $this->render('admin/detail', $data, 1);
        } else {
            $this->header('admin', 'list');
        }
    }
    public function edit()
    {
        $recordId = RecordBuilder::make()
            ->set('id', $_GET['id'] ?? null)
            ->build();

        $service = AdminService::make()
            ->detail_getByID();

        $response = oopstd($service);

        $flag = true;

        if (isset($response->error)) {
            $flag = false;
        }


        if ($flag) {
            $data = oopstd($service)->data->data->result;

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button']) && $_POST['button'] === 'editpost') {
                $formData = oopstd($_POST);

                $service = AdminService::make()
                    ->edit_recordPut($formData, $data);

                $data = oopstd($service)->data;
            }

            $this->render('admin/edit', ['data' => $data], 1);
        } else {
            $this->header('admin', 'list');
        }
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
