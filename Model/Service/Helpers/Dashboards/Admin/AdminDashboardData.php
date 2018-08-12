<?php

declare(strict_types=1);

namespace App\Model\Service\Helpers\Dashboards\Admin;

use App\Model\Query\View\SQLAdminDashboardView;

use App\Core\Database\Connection;

class AdminDashboardData
{

    private $data;

    /**
     * AdminDashboardData constructor.
     */
    public function __construct()
    {
        $conn = new Connection();
        $data = new SQLAdminDashboardView( $conn->make() );

        $this->data = $data;
    }


    /**
     * @return array
     */
    public function getAllDataFromUsersTable() : array
    {
        $data = $this->data->showAllUsers();
        return $data;
    }

    /**
     * @param string $id
     * @return array
     */
    public function getDataUserById(string $id) : array
    {
        $data = $this->data->searchUserById($id);
        return $data;
    }

}