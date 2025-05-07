<?php
class Mi
{
    static function sanitize($input)
    {
        if (!is_array($input) && !is_object($input)) {
            $input = trim($input);
        }
        return $input;
    }
    // static function noEmpty($input)
    // {
    //     if (is_array($input) || is_object($input)) {
    //         if (!empty($input)) {
    //             return true;
    //         }
    //     } else {
    //         if (!empty($input) && $input !== ' ') {
    //             return true;
    //         }
    //     }
    //     throw new Exception('Dữ liệu không được rỗng!');
    // }
}
