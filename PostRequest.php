<?php

class PostRequest
{
    public static function get($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
}
