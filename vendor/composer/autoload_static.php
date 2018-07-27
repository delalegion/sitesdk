<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dda8b8dae46899a97d56d698e2290b2
{
    public static $classMap = array (
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/Controllers/Controller.php',
        'App\\Controllers\\Core\\LoginController' => __DIR__ . '/../..' . '/Controllers/Core/LoginController.php',
        'App\\Controllers\\Helpers\\LogoutController' => __DIR__ . '/../..' . '/Controllers/Helpers/LogoutController.php',
        'App\\Core\\Database\\Connection' => __DIR__ . '/../..' . '/Core/Database/Connection.php',
        'App\\Core\\Database\\QueryBuilder' => __DIR__ . '/../..' . '/Core/Database/QueryBuilder.php',
        'App\\Core\\Interfaces\\FlashBagInterface' => __DIR__ . '/../..' . '/Core/Interfaces/FlashBagInterface.php',
        'App\\Core\\Messages\\FlashBag' => __DIR__ . '/../..' . '/Core/FlashBagMessages.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/Core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/Core/Router.php',
        'App\\Core\\Security\\Auth' => __DIR__ . '/../..' . '/Core/Security/Authorization.php',
        'App\\Core\\SessionManagement' => __DIR__ . '/../..' . '/Core/Session.php',
        'App\\Model\\Query\\Interfaces\\UserQueryInterface' => __DIR__ . '/../..' . '/Model/Query/Interfaces/UserQueryInterface.php',
        'App\\Model\\Query\\View\\SQLUserView' => __DIR__ . '/../..' . '/Model/Query/View/SQLUserView.php',
        'App\\Model\\Service\\Authorization\\Login' => __DIR__ . '/../..' . '/Model/Service/Authorization/LoginService.php',
        'App\\Model\\Service\\Helpers\\LoginData' => __DIR__ . '/../..' . '/Model/Service/Helpers/LoginData.php',
        'App\\Model\\Service\\Helpers\\UserData' => __DIR__ . '/../..' . '/Model/Service/Helpers/UserData.php',
        'BoardController' => __DIR__ . '/../..' . '/Controllers/Core/BoardController.php',
        'ComposerAutoloaderInit4dda8b8dae46899a97d56d698e2290b2' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit4dda8b8dae46899a97d56d698e2290b2' => __DIR__ . '/..' . '/composer/autoload_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4dda8b8dae46899a97d56d698e2290b2::$classMap;

        }, null, ClassLoader::class);
    }
}
