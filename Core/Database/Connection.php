<?php

namespace App\Core\Database;
use PDO;

class Connection
{

    public function make() {

        try {

            return new PDO("mysql:host=localhost;dbname=site", "root", "");

        } catch(PDOException $e) {

            die($e->getMessage());

        }

    }

}