<?php

namespace App\Core\Interfaces;

interface FlashBagInterface
{

    /**
     * @param string $type
     * @param string $messages
     */
    public function add(string $type, string $messages) : void;

    /**
     * @param string $type
     * @return string
     */
    public function display(string $type) : string;

    /**
     *
     */
    public function cleanMessage() : void;

    /**
     * @param string $type
     * @return string
     */
    public function formatMessage(string $type) : string;

}