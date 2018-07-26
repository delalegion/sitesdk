<?php

namespace App\Core\Interfaces;

interface FlashBagInterface
{

    public function add(string $type, string $messages) : void;

    public function display(string $type) : string;

    public function cleanMessage() : void;

    public function formatMessage(string $type) : string;

}