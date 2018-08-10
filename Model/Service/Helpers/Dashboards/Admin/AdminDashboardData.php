<?php

declare(strict_types=1);

namespace App\Model\Service\Helpers\Dashboards\Admin;

use App\Model\Query\View\SQLAdminDashboardView;
use App\Core\Database\Connection;

class AdminDashboardData
{

    private $data;

    public function __construct()
    {
        $conn = new Connection();
        $data = new SQLAdminDashboardView( $conn->make() );

        $this->data = $data;
    }

    public function getDataFromUsersTable()
    {
        $data = $this->data->showAllUsers();
        return $data;
    }

}