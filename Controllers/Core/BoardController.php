<?php

declare(strict_types=1);

use App\Controllers\Controller;

use App\Core\SessionManagement;
use App\Core\Request;

$session = new SessionManagement();
$session->start();

if ( !$session->get('logged') )
{
    Request::redirectTo('login');
}

class BoardController extends Controller
{

    public function index() : void
    {

        Controller::renderView(
            'Core/Board'
        );

    }

}

$board = new BoardController();
$board->index();
