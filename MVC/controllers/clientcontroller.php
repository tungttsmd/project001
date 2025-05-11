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
        $flag = true;

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $flag = false;
        }

        if ($flag) {
            $service = ClientService::make()
                ->detail_getById();

            $service = oopstd($service);

            if (isset($service->error)) {
                $flag = false;
            }

            if ($flag) {
                $response = oopstd($service)->data->result;

                $data = [
                    'data' => $response
                ];
                $this->render('client/detail', $data, 2);
            } else {
                $this->header('client', 'index');
            }
        } else {
            $this->header('client', 'index');
        }
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
