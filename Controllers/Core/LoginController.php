<?php

declare(strict_types=1);

namespace App\Controllers\Core;

use App\Controllers\Controller;

//use App\Core\Security\Auth;
use App\Core\Database\Connection;
use App\Core\{Request, SessionManagement};

use App\Model\Service\Authorization\Login;
use App\Model\Service\Helpers\LoginData;
use App\Model\Query\View\SQLUserView;



$session = new SessionManagement();
$session->start();

if ( $session->get('logged') )
{
    Request::redirectTo('board');
}

class LoginController extends Controller
{

    public $session;
    public $request;
    public $connection;

    public function __construct(SessionManagement $sessionManagement, Connection $connection)
    {
        $this->session = $sessionManagement;
        $this->connection = $connection;
    }

    public function index() : void
    {

        Controller::renderView(
            'Authorization/Login'
        );

    }

    public function login(Request $request) : void
    {

        if ( $request->get('email') && $request->get('password') ) {

            $email = $request->get('email');
            $password = $request->get('password');

            $login = new Login( new SQLUserView($this->connection->make()), $this->session );
            $login->login( new LoginData($email, $password) );

//            try {
//                $login->login(new LoginData($email, $password));
//            } catch (\Exception $exception) {
//                print '<a href="https://www.youtube.com/watch?v=u9erhDRkCD0">No coś nie pykło edwidentnie.</a>';
//            }

        }

    }

}

$login = new LoginController(new SessionManagement(), new Connection());
$login->index();
$login->login(new Request());