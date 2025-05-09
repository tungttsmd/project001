<?php include 'views/admin/widget/widget-css.php' ?>
<div class="d-flex align-items-center justify-content-between mb-3">
    <div class="input-group" style="max-width: 300px;">
        <label class="input-group-text bg-dark text-white" for="actionSelect"><b>Lọc dữ liệu</b></label>
        <select class="form-select" id="actionSelect" onchange="handleSelection(this)">
            <option value="list" <?php if (isset($_GET['filter']) && !in_array($_GET['filter'], ['accept', 'reject', 'wait'])) echo 'selected' ?>>Tất cả</option>
            <option value="accept" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'accept') echo 'selected' ?>>Đâ chấp nhận</option>
            <option value="reject" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'reject') echo 'selected' ?>>Đã từ chối</option>
            <option value="wait" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'wait') echo 'selected' ?>>Đang chờ duyệt</option>
        </select>
    </div>
</div>
<div class="frame-table" style="overflow-y: auto;">
    <table border="1" class="mt-0 table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
            <th style="width: 50px; position: sticky; top: 0;">ID</th>
            <th class="w3" style="position: sticky; top: 0;">Họ tên</th>
            <th class="w4" style="position: sticky; top: 0;">Số tài khoản</th>
            <th class="w3" style="position: sticky; top: 0;">Ngân hàng</th>
            <th class="w3" style="position: sticky; top: 0;">Liên hệ</th>
            <th class="w3" style="position: sticky; top: 0;">Nội dung</th>
            <th style="width: 86px; position: sticky; top: 0;">Trạng thái</th>
            <th style="width: 240px; position: sticky; top: 0;">Thao tác</th>
        </thead>

        <tbody>
            <?php
            if (isset($data)) {
                foreach ($data as $value) {
            ?>
                    <tr>
                        <td><b><?= $value->id ?></b></td>
                        <td><?= $value->account_name ?></td>
                        <td><?= $value->account_number ?></td>
                        <td><?= $value->account_bank ?></td>
                        <td><?= $value->scammer_contact ?></td>
                        <td><?= $value->scammer_note ?></td>
                        <td><?= (is_null($value->is_confirm)) ?
                                '<span class="badge bg-warning text-white">Xem xét</span>' : ($value->is_confirm === '1' ?
                                    '<span class="badge bg-success">Duyệt</span>' : '<span class="badge bg-danger">Từ chối</span>') ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?= mvchref('admin', 'detail', '&id=' . $value->id) ?>"><b>Xem</b></a>
                            <a class="btn btn-sm btn-success" href="<?= mvchref('admin', 'record', '&use=accept&id=' . $value->id) ?>"><b>Duyệt</b></a>
                            <a class="btn btn-sm btn-danger" href="<?= mvchref('admin', 'record', '&use=reject&id=' . $value->id) ?>"><b>Từ chối</b></a>
                            <a class="btn btn-sm btn-warning text-white" href="<?= mvchref('admin', 'record', '&use=wait&id=' . $value->id) ?>"><b>Chờ</b></a>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>
</div>
<script>
    function handleSelection(select) {
        const value = select.value;
        if (!value) return;

        const urlMap = {
            list: '<?= mvchref("admin", "list") ?>',
            accept: '<?= mvchref("admin", "list", "&filter=accept") ?>',
            reject: '<?= mvchref("admin", "list", "&filter=reject") ?>',
            wait: '<?= mvchref("admin", "list", "&filter=wait") ?>',
        };

        const href = urlMap[value];
        if (href) {
            window.location.href = href;
        }
    }
</script>