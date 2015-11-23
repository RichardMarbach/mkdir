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

    /**
     * Created a nicely formatted date string
     * @param  Carbon\Carbon $date
     * @return string
     */
    public static function prettifyDate($date)
    {
        return date('F d, Y', strtotime($date));
    }

    /**
     * Is a user admin=
     * @param  array   $roles
     * @return boolean       
     */
    public static function isAdmin($roles)
    {
        return ($roles->filter(function($item) { return $item->name === 'admin'; })->count() > 0)
            ? 1
            : 0;
    }
}