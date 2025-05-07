<?php
class DoiTuong
{
    private $name;
    private $number;
    private $bank;
    private $facebook;
    private $note;
    function __construct(
        $account_name = null,
        $account_number = null,
        $account_bank = null,
        $account_facebook = null,
        $account_note = null
    ) {
        $this->name = $account_name;
        $this->number = $account_number;
        $this->bank = $account_bank;
        $this->facebook = $account_facebook;
        $this->note = $account_note;
    }
    public function name()
    {
        return $this->name;
    }
    public function number()
    {
        return $this->number;
    }
    public function bank()
    {
        return $this->bank;
    }
    public function facebook()
    {
        return $this->facebook;
    }
    public function note()
    {
        return $this->note;
    }
}
