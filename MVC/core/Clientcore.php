<?php
class Clientcore
{
    static function listData_index(&$list, &$html)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && $_POST['button'] === 'searchpost') {
            $formData = oopstd($_POST);
            $clientSearch = new Client();
            $clientKeyword = new DoiTuong(null, $formData->{'search-account-number'});
            $fetchedList = oopstd($clientSearch->searchpost($clientKeyword));
            # Validation input
            if (!isset($fetchedList->error->message)) {
                $list = $fetchedList->data->query;
                $html->searchResult = true;
            }
        }
    }
}
