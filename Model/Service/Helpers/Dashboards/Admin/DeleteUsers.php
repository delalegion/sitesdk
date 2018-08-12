<?php

declare(strict_types=1);

namespace App\Model\Service\Helpers\Dashboards\Admin;

use App\Model\Query\Interfaces\AdminDashboardInterface;

class DeleteUsers
{
    private $sql;

    /**
     * DeleteUsers constructor.
     * @param AdminDashboardInterface $sql
     */
    public function __construct(AdminDashboardInterface $sql)
    {
        $this->sql = $sql;
    }

    /**
     * @param string $user
     * @return mixed
     */
    public function deleteUser(string $user)
    {
        return $this->sql->deleteUserSQL($user);
    }
}