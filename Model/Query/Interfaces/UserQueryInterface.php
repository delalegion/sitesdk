<?php

declare(strict_types=1);

namespace App\Model\Query\Interfaces;

interface UserQueryInterface
{
    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email);
}