<?php

declare(strict_types=1);

namespace App\Model\Service\Authorization;

use App\Core\{
    Interfaces\FlashBagInterface, Request, SessionManagement
};
use App\Core\Messages\FlashBag;

use App\Model\Service\Helpers\LoginData;
use App\Model\Query\Interfaces\UserQueryInterface;


class Login
{
    private $userQuery;
    private $session;
    private $message;


    /**
     * Login constructor.
     * @param UserQueryInterface $userQuery
     * @param SessionManagement $session
     * @param FlashBagInterface $message
     */
    public function __construct(UserQueryInterface $userQuery, SessionManagement $session, FlashBagInterface $message)
    {
        $this->userQuery = $userQuery;
        $this->session = $session;
        $this->message = $message;
    }

    /**
     * @param LoginData $loginData
     */
    public function login(LoginData $loginData): void
    {

        // Email filtering
        if (filter_var($loginData->getEmail(), FILTER_VALIDATE_EMAIL)) {

            // Taking user data
            $user = $this->userQuery->findByEmail($loginData->getEmail());

            if ($user)
            {
                if ( password_verify($loginData->getPassword(), $user['password']) ) {

                    $this->session->start();
                    $this->session->set('logged', 'true');
                    $this->session->set('userEmail', $loginData->getEmail());

                    ( $user['is_admin'] == true ) ? Request::redirectTo('admin/dashboard') : Request::redirectTo('user/dashboard');

                } else {$this->message->add('error', 'Podałeś błędne dane logowania.'); }

            } else { $this->message->add('error', "Nie znaleziono użytkownika o podanym email'u."); }

        } else { $this->message->add('error', 'Wprowadź poprawny email.'); }


    }

}
