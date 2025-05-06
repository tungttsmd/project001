<?php
$_POST['button'] = $_POST['button'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['button'] === 'submit-scammers-baocao') {
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
  $form_submit = new DoiTuong(
    $_POST['account_name'],
    $_POST['account_number'],
    $_POST['account_bank'],
    $_POST['account_facebook'],
    $_POST['account_note'],
  );
  $_POST['result'] = $model->baoCao(
    $form_submit
  );
}

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
</style>

<body>
  <form method="POST">
    <div id="flex-form">
      <h3>Báo cáo lừa đảo online</h3>
      <input type="text" name="account_name" placeholder="Tên người bị tố cáo" />
      <input
        type="text"
        name="account_number"
        placeholder="Số tài khoản người bị tố cáo" />
      <input type="text" name="account_bank" placeholder="Tên ngân hàng" />
      <input type="text" name="account_facebook" placeholder="Tên ngân hàng" />
      <textarea name="account_note" placeholder="Nội dung tố cáo"></textarea>
      <button type="submit" name="button" value="submit-scammers-baocao">Gửi duyệt scam</button>
      <a href="?folder=scammers&file=kiemtra"><button type="button" style="width: 100%;">Kiểm tra scam</button></a>
    </div>
  </form>
</body>