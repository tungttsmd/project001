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
