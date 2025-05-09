<?php include 'views/admin/widget/widget-css.php' ?>

<div class="p-3 card profile-card">
    <!-- <img class="p-3" src="https://via.placeholder.com/600x250" class="card-img-top" alt="Ảnh đại diện"> -->
    <div class="card-body p-0 profile-body">
        <p class="card-text"><strong>Tên: </strong><?= $data->account_name ?? null ?></p>
        <p class="card-text"><strong>ID: </strong><?= $data->id ?? null ?></p>
        <p class="card-text"><strong>STK: </strong><?= $data->account_number ?? null ?></p>
        <p class="card-text"><strong>Ngân hàng: </strong><?= $data->account_bank ?? null ?></p>
        <p class="card-text"><strong>Nội dung: </strong><?= $data->scammer_note ?? null ?></p>
        <p class="card-text"><strong>Liên hệ của đối tượng: </strong><?= $data->scammer_contact ?? null ?></p>
        <p class="card-text"><strong>Trạng thái: </strong><?= (is_null($data->is_confirm)) ?
                                                                '<span style="color: orange">Đang chờ duyệt</span>' : ($data->is_confirm === '1' ?
                                                                    '<span style="color: green">Chấp nhận báo cáo</span>' : '<span style="color: red">Báo cáo bị từ chối</span>') ?></p>
        <p class="card-text"><strong>Người báo cáo: </strong><?= $data->reporter_name ?? null ?></p>
        <p class="card-text"><strong>Liên hệ người báo cáo: </strong><?= $data->reporter_contact ?? null ?></p>
        <p class="card-text"><strong>Ngày báo cáo: </strong><?= $data->create_date ?? null ?></p>
        <a href="<?= mvchref('admin', 'edit', '&id=' . $data->id ?? 0) ?>" class="btn btn-warning text-white">Chỉnh sửa hồ sơ</a>
        <a href="<?= mvchref('admin', 'list') ?>" class="btn btn-primary">Quay lại danh sách</a>
    </div>
</div>