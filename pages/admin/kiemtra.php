<?php
    include 'libs/lib.php';
    include 'middleware/Mi.php';
    include 'system/config/config.php';
    include 'system/database/DBConnection.php';
    include 'system/database/DBQuery.php';
    include 'system/database/DBEscape.php';
    include 'system/database/DBStatement.php';
    include 'system/database/DBCRUD.php';
    include 'data/DoiTuong.php';
    include 'data/ScamChecker.php';
    $model = new ScamChecker();
    $form_submit = new DoiTuong($_POST['box-kiemtra']);
    $_POST['result'] = $model->kiemTraTen($form_submit);
?>
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

<body>
    <form method="POST">
        <div id="flex-form">
            <h3>Kiểm tra lừa đảo online</h3>
            <input type="text" name="box-kiemtra" placeholder="Nhập tên" />
            <button type="submit" name="button" value="submit-scammers-kiemtra">Kiểm tra ngay</button>
            <a href="?folder=scammers&file=baocao"><button type="button" name="button" style="width: 100%;">Tôi muốn báo cáo scam</button></a>
        </div>
    </form>
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
            if (isset($_POST['result']['data']['status']) && $_POST['result']['data']['status'] === 'success') {
                foreach ($_POST['result']['data']['query'] as $value) {
            ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['account_name'] ?></td>
                        <td><?= $value['account_number'] ?></td>
                        <td><?= $value['account_bank'] ?></td>
                        <td><?= $value['scammer_facebook'] ?></td>
                        <td><?= $value['scammer_note'] ?></td>
                        <td><?= (is_null($value['is_confirm'])) ? 'Đang chờ duyệt' : 'Đã xem xét' ?></td>
                    </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>
</body>