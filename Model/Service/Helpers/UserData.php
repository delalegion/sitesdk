<?php

declare(strict_types=1);

namespace App\Model\Service\Helpers;

use App\Core\SessionManagement;
use App\Model\Query\View\SQLUserView;
use App\Core\Database\Connection;

final class UserData
{

    private $session;
    private $userData;
    private $user;

    /**
     * UserData constructor.
     */
    public function __construct()
    {
        $this->session = new SessionManagement();

        $connection = new Connection();
        $this->userData = new SQLUserView( $connection->make() );

        if ( $this->session->get('userEmail') )
        {
            $this->user = $this->userData->findByEmail($this->session->get('userEmail'));
        }
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->user['nickname'];
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->user['email'];
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->user['id'];
    }

    /**
     * @return string
     */
    public function getAdminInfo()
    {
        return $this->user['is_admin'];
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->user['avatar'];
    }

}