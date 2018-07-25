<?php

declare(strict_types=1);

namespace Test\Controller;

//use App\Model\Query\View\SQLUserView;
//use App\Core\Database\Connection;
//use App\Core\SessionManagement;
//
//$con = new Connection();
//$view = new SQLUserView($con->make());
//
//if ( $view->findByEmail('hkruk1@interia.pl') )
//{
//    echo $view->findByEmail('nielot001@wp.pl')['nickname'];
//} else {
//    var_dump($view->findByEmail('hkruk1@interia.pl'));
//}
//
//$ses = new SessionManagement();

class FlashMessages {


    public function __construct()
    {
        session_start();

        // Create flash_message variable if doesn't exists yet.
        if (!array_key_exists('flash_messages', $_SESSION))
        {
            $_SESSION['flash_messages'] = [];
        }

    }

    public function add(string $type, string $messages)
    {
            $_SESSION['flash_messages'][$type] = array();
            return $_SESSION['flash_messages'][$type][] = $messages;
//        if ( !array_key_exists($type, $_SESSION['flash_messages']) )
//        {
//            $_SESSION['flash_message'] = array();
//            return $_SESSION['flash_messages'][$type] = $messages;
//        }
//        else { echo 'sdadsa'; }

    }

    public function display(string $type)
    {

        if ( array_key_exists($type, $_SESSION['flash_messages']) )
        {
            foreach ($_SESSION['flash_messages'][$type] as $data)
            {
                return $data;
            }
        }

    }

}