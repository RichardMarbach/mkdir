<?php

namespace App\Helper;

class Helper
{
    /**
     * Returns "active" if the url is at the given route
     * @param string $route
     */
    public static function setActive($routes)
    {
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (\Request::is($route)) return "active";
            }

            return '';
        }

        return \Request::is($routes) ? "active" : '';
    }
}