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

    public function detail()
    {
        $msg = null;
        $color = 'warning';
        $data = null;

        if (!isset($_GET['id'])) {
            header("location: " . mvchref('admin', 'list'));
            exit;
        }
        if (isset($_GET['id'])) {
            $recordSearch = new Admin();
            $recordId = new DoiTuong(null, null, null, null, null, null, $_GET['id']);
            $recordDetail = $recordSearch->detailpost($recordId);
            $fetchDetail = oopstd($recordDetail);
            if (isset($fetchDetail->error->extensions->code) && $fetchDetail->error->extensions->code === 'ID_NOT_FOUND') {
                $detailMsg = $fetchDetail->error->message;
                $detailColor = "danger";
            } else {
                $detailData = $fetchDetail->data->query->{'0'};
            }
        }

        # return
        $data = $detailData ?? null;
        $msg = $detailMsg ?? null;
        $color = $detailColor ?? null;

        $this->render('admin/detail', ['msg' => $msg, 'color' => $color, 'data' => $data], 1);
    }
}
