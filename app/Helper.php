<?php

namespace App\Helper;

class Helper
{
    public static function set_active($routes)
    {
        return (\Request::is($route.'/*') || \Request::is($route)) ? "active" : '';
    }
}