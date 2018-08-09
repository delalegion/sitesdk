<?php

declare(strict_types=1);

namespace App\Core\Security;

use App\Model\Service\Authorization\UserService;
use App\Core\SessionManagement;

class Auth
{

    private $userService;
    private $session;

    /**
     * Auth constructor.
     * @param UserService $userService
     * @param SessionManagement $session
     */
    public function __construct(UserService $userService, SessionManagement $session)
    {
        $this->userService = $userService;
        $this->session = $session;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function checkAccessToPage(string $type) : bool
    {

        if ($type == 'isAdmin')
        {
            return ( $this->userService->checkUserIsAdmin() == true ) ? true : false;
        }

        if ($type == 'isLogged')
        {
            return ( $this->session->get('logged') == true ) ? true : false;
        }

        return false;

    }

}