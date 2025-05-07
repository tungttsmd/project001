<?php
class ScamChecker extends DBCRUD
{
    public function kiemTraTen(DoiTuong $doituong)
    {
        $flag = true;
        $msg = '';
        $name = $doituong->name();
        if (empty($name)) {
            $flag = false;
            $msg = "Dữ liệu không được rỗng!";
        }

        if ($flag) {
            $sql = "SELECT * FROM `scammers` WHERE `account_name` LIKE ?v";
            $result = $this->prep($sql)
                ->bind(['%' . $name . '%'], '?v')
                ->exec()['data'];
            return [
                'data' => [
                    'status' => 'success',
                    'message' => 'Tìm thấy ' . $result['query_row_count'] . ' kết quả',
                    'query' => $result['query_data_fetch']
                ],
                'errors' => []
            ];
        } else {
            return $msg;
        }
    }
    public function baoCao(DoiTuong $doituong)
    {
        $flag = true;
        $msg = '';
        $exist = $this->read('scammers', [
            'account_name',
            'account_number',
            'account_bank'
        ], [
            'account_number' => $doituong->number(),
            'account_bank' => $doituong->bank()
        ]);

        foreach (func_get_args() as $value) {
            $value = Mi::sanitize($value);
            if (empty($value)) {
                $flag = false;
                $msg = 'Dữ liệu không được rỗng';
            }
        }
        if ($flag) {
            if (empty($exist)) {
                try {
                    $args = [];
                    foreach (func_get_args() as $value) {
                        $args[] = Mi::sanitize($value);
                    }
                    $this->create('scammers', [
                        'account_name',
                        'account_number',
                        'account_bank',
                        'scammer_facebook',
                        'scammer_note',
                        'is_comfirm'
                    ], [
                        $doituong->name(),
                        $doituong->number(),
                        $doituong->bank(),
                        $doituong->facebook(),
                        $doituong->note(),
                        null
                    ]);
                    return [
                        'data' => [
                            'status' => 'success',
                            'message' => 'Tố cáo thành công, chúng tôi sẽ kiểm tra, vui lòng chờ duyệt!',
                            'info' => [
                                'Ten nguoi bi to cao' => $doituong->name(),
                                'So tai khoan ngan hang' => $doituong->number(),
                                'Ten ngan hang' => $doituong->bank(),
                                'Facebook nguoi bi to cao' => $doituong->facebook(),
                                'Noi dung to cao' => $doituong->note()
                            ]
                        ],
                        'errors' => []
                    ];
                } catch (Exception $e) {
                    throw new Exception('Tố cáo không thành công: ' . $e->getMessage());
                }
            } else {
                return [
                    'errors' => [
                        'message' => 'Người này đã đuợc tố cáo với tên [' . $exist[0]['account_name'] . ']',
                        'path' => __FUNCTION__,
                        'extensions' => [
                            'code' => 'DB_EXISTED'
                        ],
                    ],
                    'data' => []
                ];
            }
        } else {
            return $msg;
        }
    }

}
