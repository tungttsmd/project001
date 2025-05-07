<?php
class clientcontroller extends controller
{
    public function index()
    {
        $this->render('client/index', [], 2);
    }
    public function report()
    {
        $this->render('client/report', [], 2);
    }
}
