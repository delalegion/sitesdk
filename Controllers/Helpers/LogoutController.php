<?php

declare(strict_types=1);

namespace App\Controllers\Helpers;

use App\Core\SessionManagement;
use App\Core\Request;

class LogoutController
{

    private $session;

    public function __construct(SessionManagement $session)
    {
        $this->session = $session;
    }

    public function logout() : void
    {
        //Start session
        $this->session->start();

        //Destroy session
        $this->session->destroyAll();

        //Redirect to login
        Request::redirectTo('login');

    }

}
