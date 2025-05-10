<?php
class RecordBuilder extends TSBuilder
{
    use BaseService;
    public function __construct()
    {
        parent::__construct("scammers");
    }
}
