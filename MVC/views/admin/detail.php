<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Hồ sơ người dùng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-card {
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-card img {
            object-fit: cover;
            height: 250px;
            width: 100%;
        }

        .profile-body {
            padding: 20px;
        }

        .profile-body h5 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="p-3 card profile-card">
        <img class="p-3" src="https://via.placeholder.com/600x250" class="card-img-top" alt="Ảnh đại diện">
        <div class="card-body p-0 profile-body">
            <p class="card-text"><strong>Tên: </strong><?= $data->account_name ?? null ?></p>
            <p class="card-text"><strong>ID: </strong><?= $data->id ?? null ?></p>
            <p class="card-text"><strong>STK: </strong><?= $data->account_number ?? null ?></p>
            <p class="card-text"><strong>Ngân hàng: </strong><?= $data->account_bank ?? null ?></p>
            <p class="card-text"><strong>Nội dung: </strong><?= $data->account_note ?? null ?></p>
            <p class="card-text"><strong>Liên hệ: </strong><?= $data->account_contact ?? null ?></p>
            <p class="card-text"><strong>Trạng thái: </strong><?= (is_null($data->is_confirm)) ?
                                                                    '<span style="color: orange">Đang chờ duyệt</span>' : ($data->is_confirm === '1' ?
                                                                        '<span style="color: green">Chấp nhận báo cáo</span>' : '<span style="color: red">Báo cáo bị từ chối</span>') ?></p>
            <p class="card-text"><strong>Người báo cáo: </strong><?= $data->reporter_name ?? null ?></p>
            <p class="card-text"><strong>Liên hệ người báo cáo: </strong><?= $data->reporter_contact ?? null ?></p>
            <p class="card-text"><strong>Ngày báo cáo: </strong><?= $data->create_date ?? null ?></p>
            <a href="#" class="btn btn-primary">Chỉnh sửa hồ sơ</a>
            <a href="<?= mvchref('admin', 'list') ?>" class="btn btn-primary">Quay lại danh sách</a>
        </div>
    </div>

</body>

</html>