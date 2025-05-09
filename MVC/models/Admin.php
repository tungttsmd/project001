<?php
class Admin extends DBCRUD
{
    public function list()
    {
        $sql = "SELECT * FROM `scammers`";
        return $this->prep($sql)->exec()['data']['query_data_fetch'];
    }
    public function recordpost(int $id, $confirm, &$msg, &$color)
    {
        try {
            if ($confirm === 'accept') {
                $result = $this->update('scammers', ['is_confirm' => 1], ['id' => $id]);
                $msg = 'Chấp nhận báo cáo';
                $color = 'info';
            } elseif ($confirm === 'reject') {
                $result = $this->update('scammers', ['is_confirm' => 0], ['id' => $id]);
                $msg = 'Đã từ chối báo cáo';
                $color = 'info';
            } else {
                $result = $this->update('scammers', ['is_confirm' => null], ['id' => $id]);
                $msg = 'Đã đưa báo cáo về diện chờ xem xét';
                $color = 'warning';
            }

            return [
                'data' => [
                    'status' => 'success',
                    'message' => $msg,
                    'result' => $result
                ],
                'errors' => []
            ];
        } catch (Exception $e) {
            throw new Exception("Duyệt báo cáo thất bại: " . $e->getMessage());
        }
    }
    public function detailpost(DoiTuong $doituong)
    {
        $sql = "SELECT * FROM `scammers` WHERE `id` = ?v";
        $result = $this->prep($sql)
            ->bind([$doituong->id()], '?v')
            ->exec()['data'];
        $data = $result['query_data_fetch'];
        $count = $result['query_row_count'];

        if (empty($data)) {
            return [
                'error' => [
                    'message' => 'Không tìm thấy ID người này',
                    'path' => __FUNCTION__,
                    'extensions' => [
                        'code' => 'ID_NOT_FOUND'
                    ],
                ],
                'data' => []
            ];
        } else {
            return [
                'data' => [
                    'status' => 'success',
                    'message' => 'Tìm thấy ' . $count . ' kết quả',
                    'query' => $data
                ],
                'error' => []
            ];
        }
    }

    public function scammerList()
    {
        $sql = "SELECT * FROM `scammers`";
        return $this->prep($sql)->exec()['data']['query_data_fetch'];
    }
    public function xoaScammer(int $id)
    {
        try {
            $result = $this->delete('scammers', ['id' => $id]);
            return [
                'data' => [
                    'status' => 'success',
                    'message' => 'Xoá scammer thành công',
                    'result' => $result
                ]
            ];
        } catch (Exception $e) {
            throw new Exception("Xoá dữ liệu thất bại: " . $e->getMessage());
        }
    }
    public function duyetScammer(int $id, int $confirm, &$msg, &$color)
    {
        try {
            if ($confirm === 1) {
                $result = $this->update('scammers', ['is_comfirm' => 1], ['id' => $id]);
                $msg = 'Chấp nhận báo cáo';
                $color = 'info';
            } elseif ($confirm === 0) {
                $result = $this->update('scammers', ['is_comfirm' => 0], ['id' => $id]);
                $msg = 'Không chấp nhận báo cáo';
                $color = 'info';
            } else {
                $result = $this->update('scammers', ['is_comfirm' => null], ['id' => $id]);
                $msg = 'Đã đưa lại vào diện chờ xem xét';
                $color = 'warning';
            }

            return [
                'data' => [
                    'status' => 'success',
                    'message' => $msg,
                    'result' => $result
                ],
                'errors' => []
            ];
        } catch (Exception $e) {
            throw new Exception("Duyệt báo cáo thất bại: " . $e->getMessage());
        }
    }
}
