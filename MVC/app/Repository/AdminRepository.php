<?php
class AdminRepository extends TableRepository
{
    use BaseService;
    public function __construct()
    {
        parent::__construct('scammers');
    }
    public function list()
    {
        return $this->all();
    }
    public function listWait()
    {
        return $this->condition(['is_confirm' => null]);
    }
    public function listReject()
    {
        return $this->condition(['is_confirm' => 0]);
    }
    public function listAccept()
    {
        return $this->condition(['is_confirm' => 1]);
    }
}
