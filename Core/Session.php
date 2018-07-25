<?php

declare(strict_types=1);

namespace App\Core;

class SessionManagement
{

    public function start()
    {
        return session_start();
    }

    public function set(string $name, string $value) : string
    {
        return $_SESSION[$name] = $value;
    }

    public function get(string $name)
    {
        if ( isset($_SESSION[$name]) )
        {
            return $_SESSION[$name];
        }
    }

    public function delete(string $name) : void
    {
        unset($_SESSION[$name]);
    }

    public function destroyAll() : void
    {
        session_destroy();
        session_unset();
    }

    public function setFlashbag(string $name, string $message) : string
    {
        $session = $_SESSION['flashbag'][$name] = $message;
        return $session;
    }
//    public function cleanFlashbag() : void
//    {
//        unset($_SESSION['flashbag']);
//    }
    public function getFlashbag(string $name)
    {
        $error = $_SESSION['flashbag'][$name] ?? null;
        unset($_SESSION['flashbag']);
        return $error;
    }

}