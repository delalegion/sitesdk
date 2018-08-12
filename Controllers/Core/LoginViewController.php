<?php

declare(strict_types=1);

namespace App\Controllers\Core;

use App\Controllers\Controller;

class LoginViewController extends Controller
{

    public function index() : void
    {

        Controller::renderView('Authorization/Login');

    }

}