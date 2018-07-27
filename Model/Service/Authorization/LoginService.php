<?php

declare(strict_types=1);

namespace App\Model\Service\Authorization;

use App\Core\{Request, SessionManagement};
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
     * @param FlashBag $message
     */
    public function __construct(UserQueryInterface $userQuery, SessionManagement $session, FlashBag $message)
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

        if (filter_var($loginData->getEmail(), FILTER_VALIDATE_EMAIL)) {

            $user = $this->userQuery->findByEmail($loginData->getEmail());

            if ($user)
            {
                if ( password_verify($loginData->getPassword(), $user['password']) ) {

                    $this->session->start();
                    $this->session->set('logged', 'true');
                    $this->session->set('userEmail', $loginData->getEmail());

                    Request::redirectTo('board');

                } else {$this->message->add('error', 'Podałeś błędne dane logowania.'); }

            } else { $this->message->add('error', "Nie znaleziono użytkownika o podanym email'u."); }

        } else { $this->message->add('error', 'Wprowadź poprawny email.'); }


    }

}
