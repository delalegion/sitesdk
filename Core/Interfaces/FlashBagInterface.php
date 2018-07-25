<?php

namespace App\Core\Interfaces;


interface FlashBagInterface
{

    public function findByEmail(string $email);

}