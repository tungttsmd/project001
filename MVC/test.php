<?php
include 'system/autoload.php';
$instance = (new RecordBuilder())
    ->set('id', 100)
    ->set('account_name', "Tùng")
    ->build();
var_dump($instance);
var_dump($instance->account_name);
$instance->account_name = 'Lệ rơi';
var_dump($instance);
