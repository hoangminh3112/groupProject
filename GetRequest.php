<?php

class GetRequest
{
    public static function get($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
}
