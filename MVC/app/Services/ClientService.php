<?php
class ClientService
{
  use ValidationService;
  use BaseService;

  public function index_search()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button']) && $_POST['button'] === 'searchpost') {
      $formData = oopstd($_POST);

      $flag = true;

      if (empty($formData->{'search-account-number'})) {
        $flag = false;
      }

      if ($flag) {
        $record = RecordBuilder::make()
          ->set('account_number', $formData->{'search-account-number'})
          ->build();

        $repo = ClientRepository::make()
          ->search($record->account_number);

        $fetchedList = $repo;

        if (!isset($fetchedList->error->message)) {

          $result = [
            'indexList' => oopstd($fetchedList),
            'indexHtml' => true,
          ];
        }

        $response = oopstd($result);
      }
    }

    return  [
      'data' => $response->indexList ?? null,
      'html' => $response->indexHtml ?? null,
    ];
  }
  public function detail_getById()
  {
    $record = RecordBuilder::make()
      ->set('id', $_GET['id'])
      ->build();

    $repo = ClientRepository::make()
      ->detail($record->id);

    $flag = true;

    if (empty($repo)) {
      $flag = false;
    }

    if ($flag) {
      return $this->success(oopstd($repo)->{'0'});
    } else {
      return $this->error('ID_NOT_FOUND', 'Không tìm thấy ID người này', ['result' => null]);
    }
  }
}
