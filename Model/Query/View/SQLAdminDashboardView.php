<?php

declare(strict_types=1);

namespace App\Model\Query\View;

use App\Model\Query\Interfaces\AdminDashboardInterface;
use \PDO;

class SQLAdminDashboardView implements AdminDashboardInterface
{

    private $pdo;

    /**
     * SQLUserView constructor.
     * @param PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @return mixed
     */
    public function showAllUsers()
    {
        $statement = $this->pdo->prepare("SELECT * FROM users");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}