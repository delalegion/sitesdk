<?php

declare(strict_types=1);

namespace App\Core;

use App\Config;

class Request
{

    /**
     * @return string
     */
    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
//        return trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function get(string $input)
    {
        if ( isset($_POST[$input]) ) : return $_POST[$input]; endif;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function getRequest(string $input)
    {
        if ( isset($_GET[$input]) ) : return $_GET[$input]; endif;
    }

    /**
     * @param string $link
     */
    public static function redirectTo(string $link)
    {
        return header('Location: ' . Config::getUrlBase() . '/' . $link);
    }

}
