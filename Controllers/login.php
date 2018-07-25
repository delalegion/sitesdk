<?php

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Database\Connection;
use App\Core\{Request, SessionManagement};

$session = new SessionManagement();
$session->start();

$request = new Request();
$connection = new Connection();

$login = new Login($request, new SQLUserView($connection->make()), $session);

try {
    $login->login(new LoginData('nielot001@wp.pl', 'hubert112'));
} catch (\Exception $exception) {
    print '<a href="https://www.youtube.com/watch?v=u9erhDRkCD0">No coś nie pykło edwidentnie.</a>';
}
