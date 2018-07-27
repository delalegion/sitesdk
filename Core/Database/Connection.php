<?php

namespace App\Core\Database;
use PDO;

class Connection
{

    /**
     * @return PDO
     */
    public function make() {

        try {

            return new PDO("mysql:host=localhost;dbname=site", "root", "");

        } catch(PDOException $e) {

            die($e->getMessage());

        }

    }

}