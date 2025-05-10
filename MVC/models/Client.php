<?php
class Client extends DBCRUD
{
    public function reportpost(DoiTuong $doituong)
    {
        $exist = $this->read('scammers', [
            'account_number',
            'account_name',
            'id',
        ], [
            'account_number' => $doituong->number(),
        ]);

        if (!isset($exist[0])) {
            try {
                $args = [];
                foreach (func_get_args() as $value) {
                    $args[] = Mi::sanitize($value);
                }
                $createId = $this->create('scammers', [
                    'account_name',
                    'account_number',
                    'account_bank',
                    'scammer_note',
                    'is_confirm',
                    'reporter_name',
                    'reporter_contact'
                ], [
                    $doituong->name(),
                    $doituong->number(),
                    $doituong->bank(),
                    $doituong->note(),
                    null,
                    $doituong->reporterName(),
                    $doituong->reporterContact(),
                ]);

                $sql = "SELECT * FROM `scammers` WHERE `id` = ?v";
                $result = oopstd($this->prep($sql)
                    ->bind([$createId], '?v')
                    ->exec()['data']);

                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Tố cáo thành công, chúng tôi sẽ kiểm tra, vui lòng chờ duyệt!',
                        'info' => $result->query_data_fetch->{'0'}
                    ],
                    'error' => []
                ];
            } catch (Exception $e) {
                throw new Exception('Tố cáo không thành công: ' . $e->getMessage());
            }
        } else {
            return [
                'error' => [
                    'message' => 'Người này đã đuợc tố cáo với tên [' . $exist[0]['account_name'] . ']',
                    'path' => __FUNCTION__,
                    'extensions' => [
                        'id' => $exist[0]['id'],
                        'code' => 'DB_EXISTED'
                    ],
                ],
                'data' => []
            ];
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

    public function KiemTraTen(DoiTuong $doituong)
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
                'error' => []
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
                                'Noi dung to cao' => $doituong->note()
                            ]
                        ],
                        'error' => []
                    ];
                } catch (Exception $e) {
                    throw new Exception('Tố cáo không thành công: ' . $e->getMessage());
                }
            } else {
                return [
                    'error' => [
                        'message' => 'Người này đã đuợc tố cáo với tên [' . $exist[0]['account_name'] . ']',
                        'path' => __FUNCTION__,
                        'extensions' => [
                            'id' => 1,
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
