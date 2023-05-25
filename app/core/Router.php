<?php
namespace App\core;

class Router
{
    private $routes;
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function get($uri, $action, $middlewares = [])
    {
        $uriRegex = preg_replace('#{([a-zA-Z0-9_-]+)}#', '([a-zA-Z0-9_-]+)', $uri);
        return $this->routes['GET'][$uriRegex] = compact('action', 'middlewares');
    }

    public function post($uri, $action, $middlewares = [])
    {
        $uriRegex = preg_replace('#{([a-zA-Z0-9_-]+)}#', '([a-zA-Z0-9_-]+)', $uri);
        return $this->routes['POST'][$uriRegex] = compact('action', 'middlewares');
    }


    public function dispatch($method, $uri)
    {
        foreach ($this->routes[$method] as $route => $routeDetails) {

            if (preg_match('#^' . $route . '$#', $uri, $matches)) {
                $params = array_slice($matches, 1);

                foreach ($routeDetails['middlewares'] as $middleware) {
                    $middleware = "App\\".$middleware;

                    $middlewareObject = new $middleware();
                    $middlewareObject->handle();
                }
                [$controllerName, $methodName] = explode('@', $routeDetails['action']);

                $controller = $this->container->get($controllerName);
                if ($params) {
                    $controller->$methodName(...$params);
                } else {
                    $controller->$methodName();
                }
                return;
            }
        }
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
    }

}