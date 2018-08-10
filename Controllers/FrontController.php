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
        if ( $Auth->checkAccessToPage('isLogged') == true ) { Request::redirectTo('user/dashboard'); }

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

    //
    //  User section
    //
        if ( Request::uri() == 'user/dashboard' )
        {
            if ( $Auth->checkAccessToPage('isLogged') == false ) { Request::redirectTo('login'); }

            $userDashboard = new App\Controllers\Core\Dashboards\User\UserDashboard( new SessionManagement(), new Connection() );
            $userDashboard->index();
        }


    //
    //  Admin section
    //
        if ( Request::uri() == 'admin/dashboard' )
        {
            if ( $Auth->checkAccessToPage('isLogged') == false ) { Request::redirectTo('login'); }
            if ( $Auth->checkAccessToPage('isAdmin') == false ) { Request::redirectTo('user/dashboard'); }

            $adminDashboard = new App\Controllers\Core\Dashboards\Admin\AdminDashboard( new SessionManagement(), new Connection() );
            $adminDashboard->index();
        }


