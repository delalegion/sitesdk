<?php

$Router->define(array(

    '' => 'Controllers/index.php',
    'start' => 'Controllers/index.php',
    'login' => 'Controllers/Core/LoginController.php',
    'board' => 'Controllers/Core/BoardController.php',
    'logout' => 'Controllers/Helpers/LogoutController.php',
    'test' => 'Controllers/Helpers/TestController.php',
    'test2' => 'Controllers/Helpers/TestController2.php',

    /* 404 page */
    '404' => 'View/Helpers/404.php'

));