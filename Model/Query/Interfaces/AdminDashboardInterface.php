<?php

declare(strict_types=1);

namespace App\Model\Query\Interfaces;

interface AdminDashboardInterface
{

    /**
     * @return mixed
     */
    public function showAllUsers();

    /**
     * @param string $id
     * @return mixed
     */
    public function deleteUserSQL(string $id);

}