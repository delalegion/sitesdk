<?php

$Router->get('', 'Controllers/index.php');
$Router->get('start', 'Controllers/index.php');
$Router->get('404', 'View/Helpers/404.php');

$Router->post('loginAction', 'Controllers/Core/LoginController.php');
$Router->get('login', 'Controllers/Core/LoginViewController.php');
$Router->get('logout', 'Controllers/Helpers/LogoutController.php');

$Router->get('test2', 'Controllers/Helpers/TestController2.php');

/** Admin section */
$Router->get('admin/dashboard', 'Controllers/Core/Dashboards/Admin/Dashboard.php');
$Router->get('admin/users/delete', 'Controllers/Core/Dashboards/Admin/DeleteUsers.php');

/** User section */
$Router->get('user/dashboard', 'Controllers/Core/Dashboards/User/Dashboard.php');
