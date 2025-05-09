<?php include 'views/admin/widget/widget-css.php' ?>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Số tài khoản</th>
        <th>Ngân hàng</th>
        <th>Liên hệ</th>
        <th>Nội dung</th>
        <th>Xét duyệt</th>
        <th>Thao tác</th>
    </thead>
    <tbody>
        <?php
        if (isset($data)) {
            foreach ($data as $value) {
        ?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->account_name ?></td>
                    <td><?= $value->account_number ?></td>
                    <td><?= $value->account_bank ?></td>
                    <td><?= $value->scammer_contact ?></td>
                    <td><?= $value->scammer_note ?></td>
                    <td><?= (is_null($value->is_confirm)) ?
                            '<span style="color: orange">Đang chờ duyệt</span>' : ($value->is_confirm === '1' ?
                                '<span style="color: green">Chấp nhận báo cáo</span>' : '<span style="color: red">Báo cáo bị từ chối</span>') ?></td>
                    <td style="white-space: nowrap;">
                        <a href="<?= mvchref('admin', 'detail', '&id=' . $value->id) ?>"><b>Chi tiết | </b></a>
                        <a href="<?= mvchref('admin', 'record', '&use=accept&id=' . $value->id) ?>"><b>Chấp nhận | </b></a>
                        <a href="<?= mvchref('admin', 'record', '&use=reject&id=' . $value->id) ?>"><b>Từ chối | </b></a>
                        <a href="<?= mvchref('admin', 'record', '&use=wait&id=' . $value->id) ?>"><b>Xét duyệt</b></a>
                    </td>
                </tr>
        <?php
            }
        } ?>
    </tbody>
</table>