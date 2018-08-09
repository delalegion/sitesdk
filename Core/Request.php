<?php

declare(strict_types=1);

namespace App\Core;

class Request
{

    /**
     * @return string
     */
    public static function uri()
    {
//        if ( isset($_GET['url']) )
//        {
//            return trim($_GET['url'], '/');
//        }

        return trim($_SERVER['REQUEST_URI'], '/');

    }

    /**
     * @param string $input
     * @return mixed
     */
    public function get(string $input)
    {
        if ( isset($_POST[$input]) )
        {
            return $_POST[$input];
        }
    }

    /**
     * @param string $link
     */
    public static function redirectTo(string $link)
    {
        return header('Location: ' . $link);
    }

}
