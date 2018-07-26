<?php

use App\Core\{Router, Request};

    /* Require composer */
    require 'vendor/autoload.php';

    /* Require routes and router */
    $Request = new Request;
    $Router = new Router;

    require 'Routes.php';
    require $Router->direct($Request::uri());

    /* Require front controller */
    require 'Controllers/FrontController.php';