<?php

$Router->get('', 'Controllers/index.php');
$Router->get('start', 'Controllers/index.php');

$Router->get('login', 'Controllers/Core/LoginController.php');
$Router->get('board', 'Controllers/Core/BoardController.php');
$Router->get('logout', 'Controllers/Helpers/LogoutController.php');

$Router->get('404', 'View/Helpers/404.php');
$Router->get('test2', 'Controllers/Helpers/TestController2.php');

/** Admin section */
$Router->get('admin/dashboard', 'Controllers/Core/Dashboards/Admin/Dashboard.php');
