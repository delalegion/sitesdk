<?php

declare(strict_types=1);

namespace App;

class Config
{

    private static $config = [
        'host'          => 'mysql:host=localhost',
        'dbname'        => 'site',
        'username'      => 'root',
        'password'      => '',
        'url_base'      => 'http://localhost:8885'
    ];

    /**
     * @return mixed
     */
    public static function getHost()
    {
        return self::$config['host'];
    }

    /**
     * @return mixed
     */
    public static function getDbName()
    {
        return self::$config['dbname'];
    }

    /**
     * @return mixed
     */
    public static function getUserName()
    {
        return self::$config['username'];
    }

    /**
     * @return mixed
     */
    public static function getPassword()
    {
        return self::$config['password'];
    }

    /**
     * @return mixed
     */
    public static function getUrlBase()
    {
        return self::$config['url_base'];
    }

}