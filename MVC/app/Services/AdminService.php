<?php
class AdminService
{
    use ValidationService;
    use BaseService;

    public function list()
    {
        if (!$this->isValid) $return = $this->validation();

        $repo = new AdminRepository();

        switch ($_GET['filter'] ?? null) {
            case 'accept':
                $result = $repo->listAccept();
                break;
            case 'reject':
                $result = $repo->listReject();
                break;
            case 'wait':
                $result = $repo->listWait();
                break;
            default:
                $result = $repo->list();
                break;
        }

        $return = $this->success($result);

        $response = oopstd($return);

        return [
            'data' => $response->data->result,
        ];
    }
    public function update_isConfirm($id, $switch)
    {
        if (!$this->isValid) return $this->validation();

        $repo = new AdminRepository();
        switch ($switch) {
            case 'accept':
                $result = $repo->putById($id, ['is_confirm' => 1]);
                $msg = 'Chấp nhận báo cáo';
                $color = 'info';
                break;
            case 'reject':
                $result = $repo->putById($id, ['is_confirm' => 0]);
                $msg = 'Đã từ chối báo cáo';
                $color = 'info';
                break;
            default:
                $result = $repo->putById($id, ['is_confirm' => null]);
                $msg = 'Đã đưa báo updateById về diện chờ xem xét';
                $color = 'warning';
                break;
        }
        return $this->success($result, $msg, ['color' => $color]);
    }
    public function detail_getByID()
    {
        if (!$this->isValid) $return = $this->validation();

        $recordId = RecordBuilder::make()
            ->set('id', $_GET['id'] ?? null)
            ->build();

        $repo = AdminRepository::make()
            ->getById($recordId->id);

        if (empty($repo)) {
            $return = oopstd($this->error(
                'ID_NOT_FOUND',
                'Không tìm thấy ID người này',
                ['color' => 'warning']
            ));
        } else {
            $return = oopstd($this->success(
                $repo[0],
                'Đã tìm thấy kết quả',
                ['color' => 'success']
            ));
        }

        $response = oopstd($return);

        $flag = true;

        if (isset($response->error)) {
            $flag = false;
        }

        return [
            'flag' => $flag,
            'data' => $return 
        ];
    }
    public function edit_recordPut($formData, $data)
    {
        $record = RecordBuilder::make()
            ->set('account_name', $formData->account_name ?? $data->account_name)
            ->set('account_number', $formData->account_number ?? $data->account_number)
            ->set('account_bank', $formData->account_bank ?? $data->account_bank)
            ->set('scammer_note', $formData->scammer_note ?? $data->scammer_note)
            ->set('reporter_name', $formData->reporter_name ?? $data->reporter_name)
            ->set('reporter_contact', $formData->reporter_contact ?? $data->reporter_contact)
            ->set('is_confirm', $formData->is_confirm ?? $data->is_confirm)
            ->set('scammer_contact', $formData->scammer_contact ?? $data->scammer_contact)
            ->set('id',  $data->id)
            ->set('create_date', $data->create_date)
            ->build();
            
        $repo = AdminRepository::make()
            ->putById($data->id, $record->all());
        return [
            'repo' => $repo,
            'data' => array_merge((array) $data, (array) $formData)
        ];
    }
}
