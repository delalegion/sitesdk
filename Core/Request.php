<?php

declare(strict_types=1);

namespace App\Core;

class Request
{
    public static function uri()
    {
        if ( isset($_GET['url']) )
        {
            return trim($_GET['url'], '/');
        }

    }

    public function get(string $input)
    {
        if ( isset($_POST[$input]) )
        {
            return $_POST[$input];
        }
    }

    public static function redirectTo(string $link)
    {
        return header('Location: ' . $link);
    }

}
