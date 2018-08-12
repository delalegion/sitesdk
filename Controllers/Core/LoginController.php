<?php

declare(strict_types=1);

namespace App\Controllers\Core;

use App\Controllers\Controller;

use App\Core\Database\Connection;
use App\Core\{Request, SessionManagement};
use App\Core\Messages\FlashBag;

use App\Model\Service\Authorization\Login;
use App\Model\Service\Helpers\LoginData;
use App\Model\Query\View\SQLUserView;

class LoginController
{

    public $session;
    public $connection;

    /**
     * LoginController constructor.
     * @param SessionManagement $sessionManagement
     * @param Connection $connection
     */
    public function __construct(SessionManagement $sessionManagement, Connection $connection)
    {
        $this->session = $sessionManagement;
        $this->connection = $connection;
    }


    /**
     * @param Request $request
     */
    public function login(Request $request) : void
    {

        if ( $request->get('email') && $request->get('password') ) {

            $email = $request->get('email');
            $password = $request->get('password');

            $login = new Login( new SQLUserView($this->connection->make()), $this->session, new FlashBag() );
            $login->login( new LoginData($email, $password) );

        }

    }

}
