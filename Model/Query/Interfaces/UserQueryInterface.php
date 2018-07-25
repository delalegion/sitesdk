<?php

declare(strict_types=1);

namespace App\Model\Query\Interfaces;

interface UserQueryInterface
{
    public function findByEmail(string $email);
}