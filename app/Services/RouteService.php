<?php

namespace App\Services;

class RouteService
{
    private static $routes = [];

    private static function add($uri, $controller, $action, $method='GET', $middleware=[])
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }

    public static function get($uri, $controller, $action, $middleware=[])
    {
        self::add('GET', $uri, $controller, $action, $middleware);
    }

    public static function post()
    {
        //
    }

    public static function put()
    {
        //
    }

    public static function patch()
    {
        //
    }

    public static function delete()
    {
        //
    }

    public static function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach(self::$routes as $route){
            if($route['method'] === $requestMethod && $route['uri'] === $requestUri){
                return call_user_func($route['action']);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

}
