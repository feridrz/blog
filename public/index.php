<?php
use FastRoute\RouteCollector;
use Nyholm\Psr7\Factory\Psr17Factory;

require_once __DIR__.'/vendor/autoload.php';
if (!isset($_SESSION)) {
    session_set_cookie_params([
        'lifetime' => 3600,
        'path' => '/',
        'domain' => $_SERVER['SERVER_NAME'],
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict',
    ]);
    session_start();
}

require_once __DIR__.'/app/helpers.php';
$container = require 'container.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/");
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $route)  {
    require 'routes.php';
});

// Create the PSR-17 factories for request and response
$requestFactory = new Psr17Factory();
$responseFactory = new Psr17Factory();
$streamFactory = new Psr17Factory();

// Create the request and response objects
$request = $requestFactory->createServerRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$response = $responseFactory->createResponse();

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Handle 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // Handle 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        // Resolve the controller and method from the handler
        [$controllerClass, $method] = $handler;

        // Retrieve the instance of the controller from the container
        $controller = $container->get($controllerClass);

        // Call the method on the controller with dependencies resolved
        $response = $container->call([$controller, $method], ['request' => $request, 'response' => $response] + $vars);
        break;
}