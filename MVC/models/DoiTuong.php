<?php
class DoiTuong
{
    private $name;
    private $number;
    private $bank;
    private $note;
    private $reporter_name;
    private $reporter_contact;
    private $id;
    function __construct(
        $account_name = null,
        $account_number = null,
        $account_bank = null,
        $account_note = null,
        $reporter_name = null,
        $reporter_contact = null,
        $id = null,
    ) {
        $this->name = $account_name;
        $this->number = $account_number;
        $this->bank = $account_bank;
        $this->note = $account_note;
        $this->reporter_name = $reporter_name;
        $this->reporter_contact = $reporter_contact;
        $this->id = $id;
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
    public function note()
    {
        return $this->note;
    }
    public function reporterContact()
    {
        return $this->reporter_contact;
    }
    public function reporterName()
    {
        return $this->reporter_name;
    }
    public function id()
    {
        return $this->id;
    }
}
