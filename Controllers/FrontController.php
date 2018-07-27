<?php

declare(strict_types=1);

use App\Core\{Request, SessionManagement};
use App\Core\Database\Connection;

use App\Controllers\Core\LoginController;
use App\Controllers\Helpers\LogoutController;



/*
 * Run: controllers section
 *
 */


// Login controller
if ( Request::uri() == 'login' )
{
    $loginController = new LoginController( new SessionManagement(), new Connection() );
    $loginController->login( new Request() );
    $loginController->index();
}

// Logout controller
if ( Request::uri() == 'logout' )
{
    $logoutController = new LogoutController( new SessionManagement() );
    $logoutController->logout();
}

// Board controller
if ( Request::uri() == 'board' ) {

    $boardController = new BoardController( new SessionManagement(), new Connection() );
    $boardController->index();

}

