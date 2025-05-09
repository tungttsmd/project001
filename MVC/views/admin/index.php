<h3>Danh sách chức năng:</h3>
<table border="1" class="mt-0 table table-bordered table-hover table-striped align-middle">
    <thead>
        <th>Chức năng</th>
        <th>Truy cập (chưa)</th>
    </thead>
    <tbody>
        <tr>
            <td><a href="<?= mvchref('admin', 'list') ?>">Quản lý toàn bộ danh sách</a></td>
            <td>Admin</td>
        </tr>
        <tr>
            <td><a href="<?= mvchref('admin', 'list', '&filter=accept') ?>">Quản lý danh sách đã chấp nhận</a></td>
            <td>Admin</td>
        </tr>
        <tr>
            <td><a href="<?= mvchref('admin', 'list', '&filter=reject') ?>">Quản lý toàn bộ danh sách từ chối</a></td>
            <td>Admin</td>
        </tr>
        <tr>
            <td><a href="<?= mvchref('admin', 'list', '&filter=wait') ?>">Quản lý toàn bộ danh sách đang chờ</a></td>
            <td>Admin</td>
        </tr>
        <tr>
            <td><a href="<?= mvchref('admin', 'search', '&filter=wait') ?>">Tra cứu STK</a></td>
            <td>Client</td>
        </tr>
        <tr>
            <td><a href="<?= mvchref('admin', 'report', '&filter=wait') ?>">Tố cáo</a></td>
            <td>Client</td>
        </tr>

    </tbody>
</table>