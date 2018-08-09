<?php

namespace App\Core;

class Router
{

    public $routes = [];

    /**
     * @param string $uri
     * @return mixed
     */
    public function direct(string $uri)
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


    /**
     * @param string $uri
     * @param string $controller
     */
    public function get(string $uri, string $controller)
    {
        $this->routes[$uri] = $controller;
    }

}