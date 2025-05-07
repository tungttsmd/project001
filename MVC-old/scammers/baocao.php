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

  .alert-mini {
    font-size: 0.85rem;
    padding: 0.3rem 0.75rem;
    margin: 0.5rem 0;
    display: inline-block;
  }
</style>

<body>
  <form method="POST">
    <div id="flex-form">
      <h3>Báo cáo lừa đảo online</h3>
      <?php if (isset($msg)) { ?>
      <div class="alert alert-<?= $color ?? 'warning' ?> alert-mini" role="alert">
        <?= $msg ?? '' ?>
      </div>
      <?php } ?>
      <input type="text" name="account_name" placeholder="Tên người bị tố cáo" />
      <input
        type="text"
        name="account_number"
        placeholder="Số tài khoản người bị tố cáo" />
      <input type="text" name="account_bank" placeholder="Tên ngân hàng" />
      <input type="text" name="account_facebook" placeholder="Tên ngân hàng" />
      <textarea name="account_note" placeholder="Nội dung tố cáo"></textarea>
      <button type="submit" name="button" value="submit-scammers-baocao">Gửi duyệt scam</button>
      <a href=""><button type="button" style="width: 100%;">Kiểm tra scam</button></a>
    </div>

  </form>
</body>