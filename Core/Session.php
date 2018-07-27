<?php

declare(strict_types=1);

namespace App\Core;

class SessionManagement
{

    /**
     * @return bool
     */
    public function start()
    {
        return session_start();
    }

    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public function set(string $name, string $value) : string
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        if ( isset($_SESSION[$name]) )
        {
            return $_SESSION[$name];
        }
    }

    /**
     * @param string $name
     */
    public function delete(string $name) : void
    {
        unset($_SESSION[$name]);
    }

    /**
     *
     */
    public function destroyAll() : void
    {
        session_destroy();
        session_unset();
    }

}