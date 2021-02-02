<?php

class Auth
{
    public static function check()
    {
        return isset($_SESSION['user']);
    }

    public static function user()
    {
        return self::check() ? $_SESSION['user'] : null;
    }
}
