<?php
class Admincore
{
    static function list_fetchAll(&$data)
    {
        $adminList = new Admin();
        $fetchedList = oopstd($adminList->list());

        # Return
        $data = $fetchedList ?? null;
    }
    static function record_update()
    {
        if (isset($_GET['use'], $_GET['id']) && in_array($_GET['use'], ['accept', 'reject', 'wait'])) {

            $adminUpdate = new Admin();
            $adminUpdate->recordpost($_GET['id'], $_GET['use'], $msg, $color);

            # not return
            header("location: " . mvchref('admin', 'list'));
            exit;
        }
    }
    static function detail_recordFetch(&$data, &$msg, &$color)
    {
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
    }






    static function report_dataSave(&$data, &$msg, &$color)
    {
        # access this action by which method?
        $flag = true;
        $reportpost = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && $_POST['button'] === 'reportpost';
        if (!$reportpost) {
            $flag = false;
            # Truy cập action không không thông qua POST method -> clean SESSION['formSave'] (a little UX function)
        }

        # start validation data
        if ($flag) {
            $formData = oopstd($_POST);

            $validation = [
                $formData->account_name ?? null,
                $formData->account_number ?? null,
                $formData->account_bank ?? null,
                $formData->account_note ?? null,
                $formData->reporter_name ?? null,
                $formData->reporter_contact ?? null,
            ];
            foreach ($validation as $value) {
                if (empty($value)) {
                    $flag = false;
                    $reportMsg = "Dữ liệu bắt buộc * không được để trống!";
                    $reportColor = "warning";
                    break;
                }
                if (!preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
                    $flag = false;
                    $reportMsg = "Chỉ chấp nhận kí tự chữ cái, số và dấu '_'!";
                    $reportColor = "danger";
                    break;
                }
            }
            $_SESSION['formSave'] = oopunset($formData, 'button');

            # start save data
            if ($flag) {
                $clientReport = new Client();
                $clientInput = new DoiTuong($formData->account_name, $formData->account_number, $formData->account_bank, $formData->account_note);
                $reportStatus = oopstd($clientReport->reportpost($clientInput));

                # data input is existed (account_number)
                if (isset($reportStatus->error->extensions->code) && $reportStatus->error->extensions->code === "DB_EXISTED") {
                    $id = $reportStatus->error->extensions->id;
                    $detailButtonHtml = obget("views/client/widget/widget-button-detail.php", ['id' => $id]);
                    $reportMsg = $reportStatus->error->message . $detailButtonHtml;
                    $reportColor = 'warning';
                } else {
                    # UX - redraw data user inputed before if they submit for checking their entrying error easier
                    $id = $reportStatus->data->info->id;
                    $detailButtonHtml = obget("views/client/widget/widget-button-detail.php", ['id' => $id]);
                    $reportMsg = $reportStatus->data->message . $detailButtonHtml;
                    $reportColor = 'success';
                }
            }
        } else {
            # not access form by POST -> clean form without input data
            unset($_SESSION['formSave']);
        }

        # Return UX save (SESSION is forced)
        $msg = $reportMsg ?? null;
        $color = $reportColor ?? null;
        $data = $_SESSION['formSave'] ?? null;
    }
}
