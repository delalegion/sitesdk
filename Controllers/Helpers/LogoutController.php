<?php

namespace App\Controllers\Helpers;

use App\Controllers\Controller;

use App\Core\SessionManagement;
use App\Core\Request;

class LogoutController extends Controller
{

    private $session;

    public function __construct(SessionManagement $session)
    {
        $this->session = $session;
    }

    public function index() : void
    {

        Controller::renderView('Helpers/Logout');

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

$logout = new LogoutController(new SessionManagement());
$logout->index();
$logout->logout();