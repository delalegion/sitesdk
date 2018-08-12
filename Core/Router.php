<?php

namespace App\Core;

class Router
{

    protected $routes = [
        'GET'   => [],
        'POST'  => []
    ];

    /**
     * @param string $uri
     * @return mixed
     */
    public function direct(string $uri, string $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType]))
        {
            return $this->routes[$requestType][$uri];
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
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param string $controller
     */
    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


}