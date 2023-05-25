<?php

use App\core\Router;
use App\core\Container;
use App\controllers\AuthController;
use App\controllers\PostController;
use App\controllers\CommentController;

use App\services\PostService;
use App\services\AuthService;
use App\services\CommentService;

use App\repositories\PostRepository;
use App\repositories\CommentRepository;
use App\repositories\AuthRepository;
use App\core\Database;

$container = new Container();


$router = new Router($container);


$container->set('Database', function () {
   return (new Database())->db;
});
$container->set('PostRepository', function ($container) {
   return new PostRepository($container->get('Database'));
});
$container->set('CommentRepository', function ($container) {
   return new CommentRepository($container->get('Database'));
});
$container->set('AuthRepository', function ($container) {
   return new AuthRepository($container->get('Database'));
});



$container->set('PostService', function ($container) {
   return new PostService($container->get('PostRepository'), $container->get('CommentRepository'));
});
$container->set('AuthService', function ($container) {
   return new AuthService($container->get('AuthRepository'));
});
$container->set('CommentService', function ($container) {
   return new CommentService($container->get('CommentRepository'));
});

$container->set('PostController', function ($container) {
   return new PostController($container->get('PostService'));
});
$container->set('AuthController', function ($container) {
   return new AuthController($container->get('AuthService'));
});
$container->set('CommentController', function ($container) {
   return new CommentController($container->get('CommentService'));
});
