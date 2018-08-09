<?php

declare(strict_types=1);

use App\Core\{Request, SessionManagement};
use App\Core\Database\Connection;

use App\Core\Security\Auth;
use App\Model\Service\Helpers\UserData;
use App\Model\Service\Authorization\UserService;

// Starting session
$Session = new SessionManagement();
$Session->start();

// Starting Auth controller
$Auth = new Auth( new UserService(new UserData()), new SessionManagement() );


/*
 *
 *  Running controllers
 *
 */

    // Login controller
    if ( Request::uri() == 'login' )
    {
        if ( $Auth->checkAccessToPage('isLogged') == true ) { Request::redirectTo('board'); }

        $loginController = new App\Controllers\Core\LoginController( new SessionManagement(), new Connection() );
        $loginController->login( new Request() );
        $loginController->index();
    }

    // Logout controller
    if ( Request::uri() == 'logout' )
    {
        if ( $Auth->checkAccessToPage('isLogged') == false ) { Request::redirectTo('login'); }

        $logoutController = new App\Controllers\Helpers\LogoutController( new SessionManagement() );
        $logoutController->logout();
    }

    // Board controller
    if ( Request::uri() == 'board' )
    {
        if ( $Auth->checkAccessToPage('isLogged') == false ) { Request::redirectTo('login'); }

        $boardController = new App\Controllers\BoardController( new SessionManagement(), new Connection() );
        $boardController->index();
    }

    // Board controller
    if ( Request::uri() == 'admin/dashboard' )
    {
        if ( $Auth->checkAccessToPage('isLogged') == false ) { Request::redirectTo('login'); }
        if ( $Auth->checkAccessToPage('isAdmin') == false ) { Request::redirectTo('board'); }

        $boardController = new App\Controllers\Core\Dashboards\Admin\AdminDashboard( new SessionManagement(), new Connection() );
        $boardController->index();
    }


