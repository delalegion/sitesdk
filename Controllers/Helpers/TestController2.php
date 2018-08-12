<?php

declare(strict_types=1);

use App\Model\Service\Helpers\Dashboards\Admin\AdminDashboardData;
use App\Model\Query\View\SQLAdminDashboardView;
use App\Core\Database\Connection;
use App\Core\Request;

$con = new Connection();
//$data = new AdminDashboardData( new SQLAdminDashboardView( $con->make() ) );

//echo '<pre>';
//var_dump($data->getSomeDataFromUsersTable());
//echo '</pre>';
//
//foreach ($data->getSomeDataFromUsersTable() as $item)
//{
//    echo '<pre>';
//    var_dump($item);
//    echo '</pre>';
//}

//$Request = new Request();
//var_dump($Request->getRequest('user'));

//var_dump(new PDO("'mysql:host=" . Config::getHost() . ";dbname=" . Config::getDbName() . "', " . Config::getUserName() . ", " . Config::getPassword() . ""));



//echo password_hash("nielot11", PASSWORD_BCRYPT);