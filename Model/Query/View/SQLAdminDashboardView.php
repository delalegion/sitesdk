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
        $statement = $this->pdo->prepare("SELECT * FROM users ORDER BY is_admin DESC");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $id
     */
    public function deleteUserSQL(string $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function searchUserById(string $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}