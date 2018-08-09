<?php

declare(strict_types=1);

namespace App\Model\Service\Authorization;

use App\Model\Service\Helpers\UserData;

class UserService
{

    protected $userData;

    /**
     * UserService constructor.
     * @param UserData $userData
     */
    public function __construct(UserData $userData)
    {
        $this->userData = $userData;
    }

    /**
     * @return bool
     */
    public function checkUserIsAdmin()
    {
        return ( $this->userData->getAdminInfo() == true  ) ? true : false;
    }

}