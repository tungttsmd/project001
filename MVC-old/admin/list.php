<style>
    #flex-form {
        display: flex;
        flex-direction: column;
        border: 1px solid black;
        gap: 20px;
        padding: 20px;
        max-width: 768px;
        justify-content: center;
    }

    #flex-form input,
    #flex-form textarea,
    #flex-form button {
        padding: 10px 20px;
    }

    table {
        width: 100%;
        outline: 1px solid black;
        margin-top: 20px;
        min-height: 100px;
    }

    table td {
        outline: 1px solid black;
        padding: 12px 2px;
    }
</style>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Số tài khoản</th>
        <th>Ngân hàng</th>
        <th>Facebook</th>
        <th>Nội dung</th>
        <th>Xét duyệt</th>
    </thead>
    <tbody>
        <?php
        if (isset($data)) {
            foreach ($data as $value) {
        ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['account_name'] ?></td>
                    <td><?= $value['account_number'] ?></td>
                    <td><?= $value['account_bank'] ?></td>
                    <td><?= $value['scammer_facebook'] ?></td>
                    <td><?= $value['scammer_note'] ?></td>
                    <td><?php if (!is_null($value['is_comfirm'])) {
                            echo $value['is_comfirm'] == 0 ?
                                '<span style="color: red">Không chấp nhận</span>' : '<span style="color: green">Chấp nhận báo cáo</span>';
                        } else {
                            echo '<span style="color: orange">Đang xem xét...</span>';
                        } ?></td>
                    <td><?= (is_null($value['is_comfirm'])) ? '<span style="color: red">Đang chờ duyệt</span>' : '<span style="color: green">Đã xem xét</span>' ?></td>
                    <td>
                        <a href="?id=<?= $value['id'] ?>"><button type="button" name="button" value="listAccept">Chi tiết</button></a>
                        <a href="?id=<?= $value['id'] ?>"><button type="button" name="button" value="listAccept">Chấp nhận</button></a>
                        <a href="?folder=admin&file=duyet&mode=0&id=<?= $value['id'] ?>"><button>Không chấp nhận</button></a>
                        <a href="?folder=admin&file=duyet&mode=2&id=<?= $value['id'] ?>"><button>Đưa về diện xem xét lại</button></a>
                    </td>
                </tr>
        <?php
            }
        } ?>
    </tbody>
</table>