<?php

declare(strict_types=1);

use Test\Controller\FlashMessages;
use App\Model\Query\View\SQLUserView;
use App\Core\Database\Connection;

$c = new Connection();
$sql = new SQLUserView($c->make());

var_dump($sql->findByEmail('nielot0assda.pl2'));

$flash = new FlashMessages();

//unset($_SESSION['flash_messages']);
//var_dump($flash->add('error', 'Some problems with our systems..'));
$flash->add('error', 'Your profile cant be changes..');
echo $flash->display('error');

$array = [
    'error' => array(
        'Some',
        'Think',
        'Went',
        'Wrong'
    ),
    'info' => array(
        'Heh',
    )
];
//echo '<pre>';
//var_dump($array['error']);
//echo '</pre>';

foreach ($array['error'] as $data)
{
    echo $data;
}