<?php
class clientcontroller extends controller
{
    public function index()
    {
        $list = oopstd([]);
        $html = oopstd([]);
        Clientcore::listData_index($list, $html);
        $this->render('client/index', ['data' => $list, 'html' => $html], 2);
    }
    public function detail()
    {
        if (isset($_GET['id'])) {
            $this->render('client/detail', [], 2);
        }
    }
    public function report()
    {
        $msg = '';
        $color = '';
        $data = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && $_POST['button'] === 'reportpost') {
            $formData = oopstd($_POST);
            $clientReport = new Client();
            $clientInput = new DoiTuong($formData->account_name, $formData->account_number, $formData->account_bank, $formData->account_note);
            $reportStatus = oopstd($clientReport->reportpost($clientInput));
            if (isset($reportStatus->error->extensions->code) && $reportStatus->error->extensions->code === "DB_EXISTED") {
                $msg = $reportStatus->error->message;
                $color = 'warning';
            } else {
                $data = oopunset($formData, 'button');
                $msg = $reportStatus->data->message;
                $color = 'success';
                # reuse data even when reloaded -> use SESSION
                $_SESSION['formSave'] = $data;
            }
        }
        if (isset($_GET['clean']) && $_GET['clean'] === 'true') {
            unset($_SESSION['formSave']);
            # DEBUG NOTE. USE HEADER IS NOT SAFE
            header('Location: ' . mvchref('client', 'report'));
            exit;
        };

        $this->render('client/report', ['msg' => $msg, 'color' => $color, 'data' => $_SESSION['formSave'] ?? false], 2);
    }
}
