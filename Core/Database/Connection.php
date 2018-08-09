<?php

namespace App\Core\Database;

use PDO;
use App\Config;

class Connection
{

    /**
     * @return PDO
     */
    public function make() {

        try {

            return new PDO(
                Config::getHost() . ';dbname=' . Config::getDbName(),
                Config::getUserName(),
                Config::getPassword()
            );

        } catch(PDOException $e) {

            die($e->getMessage());

        }

    }

}