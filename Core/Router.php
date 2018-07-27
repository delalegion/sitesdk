<?php

namespace App\Core;

use App\Core\Request;

class Router
{

    protected $routes = [];

    /**
     * @param $routes
     */
    public function define($routes)
    {

        $this->routes = $routes;

    }

    /**
     * @param $uri
     * @return mixed
     */
    public function direct($uri)
    {

        if (array_key_exists($uri, $this->routes))
        {
            return $this->routes[$uri];
        }
        else {

            Request::redirectTo('404');
//            throw new \InvalidArgumentException("This route is not found in uri.");
        }

    }

}