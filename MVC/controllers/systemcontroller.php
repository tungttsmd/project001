<?php
class systemcontroller extends controller
{
    public function _404()
    {
        $this->render('system/_404', [], '0');
    }
}
