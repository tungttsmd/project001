<?php include 'views/admin/widget/widget-css.php' ?>

<form method="post" class="p-3 card profile-card">
    <!-- <img class="p-3" src="https://via.placeholder.com/600x250" alt="Ảnh đại diện"> -->
    <div class="card-body p-0 profile-body">
        <?php if (isset($msg, $color) && $msg) { ?>
            <div class="p-2 alert alert-<?= $color ?? 'primary' ?>" role="alert">
                <strong class="d-flex gap-3 align-items-center"><?= $msg ?? '...' ?></strong>
            </div>
        <?php } ?>

        <div class="mb-2 d-flex justify-content-between">
            <p>Số ID: <b><?= htmlspecialchars($data->id ?? '') ?></b></p>
            <p> Ngày báo cáo: <?= htmlspecialchars($data->create_date ?? '') ?></p>

        </div>

        <div class="mb-2">
            <label><strong>Tên:</strong></label>
            <input type="text" name="account_name" class="form-control" value="<?= htmlspecialchars($data->account_name ?? '') ?>">
        </div>

        <div class="mb-2">
            <label><strong>STK:</strong></label>
            <input type="text" name="account_number" class="form-control" value="<?= htmlspecialchars($data->account_number ?? '') ?>">
        </div>

        <div class="mb-2">
            <label><strong>Ngân hàng:</strong></label>
            <input type="text" name="account_bank" class="form-control" value="<?= htmlspecialchars($data->account_bank ?? '') ?>">
        </div>

        <div class="mb-2">
            <label><strong>Nội dung:</strong></label>
            <textarea name="scammer_note" class="form-control"><?= htmlspecialchars($data->scammer_note ?? '') ?></textarea>
        </div>

        <div class="mb-2">
            <label><strong>Liên hệ của đối tượng:</strong></label>
            <input type="text" name="scammer_contact" class="form-control" value="<?= htmlspecialchars($data->scammer_contact ?? '') ?>">
        </div>

        <div class="mb-2">
            <label><strong>Trạng thái:</strong></label>
            <select name="is_confirm" class="form-control">
                <option value="" style="color:orange" <?= is_null($data->is_confirm ?? '') ? 'selected' : '' ?>><?= $data ? "Đang chờ duyệt" : '...' ?></option>
                <option value="1" style="color:green" <?= ($data->is_confirm ?? null) === '1' ? 'selected' : '' ?>>Chấp nhận báo cáo</option>
                <option value="0" style="color:red" <?= ($data->is_confirm ?? null) === '0' ? 'selected' : '' ?>>Báo cáo bị từ chối</option>
            </select>
        </div>

        <div class="mb-2">
            <label><strong>Người báo cáo:</strong></label>
            <input type="text" name="reporter_name" class="form-control" value="<?= htmlspecialchars($data->reporter_name ?? '') ?>">
        </div>

        <div class="mb-2">
            <label><strong>Liên hệ người báo cáo:</strong></label>
            <input type="text" name="reporter_contact" class="form-control" value="<?= htmlspecialchars($data->reporter_contact ?? '') ?>">
        </div>

        <button type="submit" name="button" value="editpost" class="btn btn-success">Lưu thay đổi</button>
        <a href="<?= mvchref('admin', 'detail', '&id=' . $data->id ?? 0) ?>" class="btn btn-warning text-white">Xem thay đổi</a>
        <a href="<?= mvchref('admin', 'list') ?>" class="btn btn-primary text-white">Quay lại danh sách</a>
    </div>
</form>