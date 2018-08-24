<?php

declare(strict_types=1);

//use App\Model\Service\Helpers\Dashboards\Admin;
//
//$adm = new Admin\AdminDashboardData();
//var_dump($adm->getDataUserById('2'));

session_start();

use App\Core\Messages\FlashBag;
$flash = new FlashBag();

$flash->add('error', 'hi');
$flash->add('error', 'hi2');
$flash->add('error', 'hi3');
$flash->add('error2', 'hi3');


use App\Core\SessionManagement;
$session = new SessionManagement();

if ( $session->get('flash_messages') )
{
    $data = explode(',', $flash->display('error'));

    foreach ($data as $value)
    {
        echo $value;
    }
}

//var_dump($flash->displayAll());
//use App\Core\Database\Connection;
//use App\Core\Interfaces\FlashBagInterface;
//use App\Core\Request;
//
//use App\Model\Service\Helpers\Dashboards\Admin\DeleteUsers;
//use App\Model\Query\View\SQLAdminDashboardView;
//
//$con = new Connection();
//
//// Delete user
//$delete = new DeleteUsers(new SQLAdminDashboardView($con->make()));
//
//var_dump($delete->deleteUser($_GET['user']));
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