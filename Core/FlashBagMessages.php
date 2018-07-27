<?php

declare(strict_types=1);

namespace App\Core\Messages;

use App\Core\Interfaces\FlashBagInterface;

class FlashBag implements FlashBagInterface
{

    /**
     * FlashBag constructor.
     */
    public function __construct()
    {
        // Create flash_message variable if doesn't exists yet.
        if (!array_key_exists('flash_messages', $_SESSION))
        {
            $_SESSION['flash_messages'] = array();
        }
    }

    /**
     * @param string $type
     * @param string $messages
     */
    public function add(string $type, string $messages) : void
    {
        $_SESSION['flash_messages'][$type][] =  $messages;
    }

    /**
     * @param string $type
     * @return string
     */
    public function display(string $type) : string
    {
        $message = $this->formatMessage($type);
        $this->cleanMessage();
        return $message;
    }

    /**
     *
     */
    public function cleanMessage() : void
    {
        unset($_SESSION['flash_messages']);
    }

    /**
     * @param string $type
     * @return string
     */
    public function formatMessage(string $type) : string
    {
        $implode = implode(',', $_SESSION['flash_messages'][$type]);
        $output = trim($implode);

        return $output;
    }

}