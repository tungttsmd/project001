<?php
class ClientRepository extends TableRepository
{
    use BaseService;
    public function __construct()
    {
        parent::__construct('scammers');
    }
    public function search($inputNumberKeyword)
    {
        return $this->belike($inputNumberKeyword, 'account_number');
    }
}
