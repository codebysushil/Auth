<?php

namespace App\Services;

class RouteService
{
    private static $routes = [];

    private static $params = [];

    private static $controllerNamespace = 'App\\Controllers';

    private static function add($uri, $controller, $action, $method = 'GET', $middleware = [])
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }

    public static function get($uri, $controller, $action, $middleware = [])
    {
        self::add('GET', $uri, $controller, $action, $middleware);
    }

    public static function post($uri, $controller, $action, $middleware = [])
    {
        self::add('POST', $uri, $controller, $action, $middleware);
    }

    public static function put($uri, $controller, $action, $middleware = [])
    {
        self::add('PUT', $uri, $controller, $action, $middleware);
    }

    public static function patch($uri, $controller, $action, $middleware = [])
    {
        self::add('PATCH', $uri, $controller, $action, $middleware);
    }

    public static function delete($uri, $controller, $action, $middleware = [])
    {
        self::add('DELETE', $uri, $controller, $action, $middleware);
    }

    public static function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && $route['uri'] === $requestUri) {
                return call_user_func($route['action']);
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }

    private static function dinamicRoute()
    {
        // route
    }
}
