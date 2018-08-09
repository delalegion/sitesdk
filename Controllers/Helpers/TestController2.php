<?php

declare(strict_types=1);

use App\Config;

echo '<pre>';
var_dump($_SERVER);
echo '</pre>';

echo '<br/>';

//var_dump(new PDO("'mysql:host=" . Config::getHost() . ";dbname=" . Config::getDbName() . "', " . Config::getUserName() . ", " . Config::getPassword() . ""));

