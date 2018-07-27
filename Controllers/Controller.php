<?php

declare(strict_types=1);

namespace App\Controllers;

class Controller
{

    /**
     * @param string $destination
     */
    public static function renderView(string $destination)
    {
        require 'View/' . $destination . '.php';
    }

}