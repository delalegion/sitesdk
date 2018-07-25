<?php

declare(strict_types=1);

namespace App\Model\Service\Authorization;

use App\Core\{Request, SessionManagement};
use App\Model\Service\Helpers\LoginData;
use App\Model\Query\Interfaces\UserQueryInterface;

class Login
{
    private $userQuery;
    private $session;

    public function __construct(UserQueryInterface $userQuery, SessionManagement $session)
    {
        $this->userQuery = $userQuery;
        $this->session = $session;
    }

    public function login(LoginData $loginData): void
    {

        if (!filter_var($loginData->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Something went email.");
        }

        $user = $this->userQuery->findByEmail($loginData->getEmail());

        if ( $user['password'] === $loginData->getPassword()) {

            $this->session->start();
            $this->session->set('logged', 'true');

            Request::redirectTo('board');

        } else {
            throw new \InvalidArgumentException("Something went wrong.");
        }

    }

}
