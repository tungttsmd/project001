<?php
# core index.php
function page404()
{
    $instance = new systemcontroller();
    $instance->_404();
}