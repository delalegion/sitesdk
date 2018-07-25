<?php

declare(strict_types=1);

namespace App\Core\Security;

use App\Core\SessionManagement;

class Auth
{

    public static function checkSession(string $session) : bool
    {

        $sessionManagement = new SessionManagement();
        $sessionManagement->get($session);

        if ( $sessionManagement->get($session) )
        {
            return false;
        }
        else { return true; }

    }

}