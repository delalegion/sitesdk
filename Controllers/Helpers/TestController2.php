<?php

declare(strict_types=1);

use App\Model\Service\Helpers\Dashboards\Admin\AdminDashboardData;
use App\Model\Query\View\SQLAdminDashboardView;
use App\Core\Database\Connection;

$con = new Connection();
$data = new AdminDashboardData( new SQLAdminDashboardView( $con->make() ) );

echo '<pre>';
var_dump($data->getSomeDataFromUsersTable());
echo '</pre>';

foreach ($data->getSomeDataFromUsersTable() as $item)
{
    echo '<pre>';
    var_dump($item);
    echo '</pre>';
}



//var_dump(new PDO("'mysql:host=" . Config::getHost() . ";dbname=" . Config::getDbName() . "', " . Config::getUserName() . ", " . Config::getPassword() . ""));

