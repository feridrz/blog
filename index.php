<?php
require_once 'app/core/bootstrap.php';

$router->get('/login', 'AuthController@loginView');
$router->post('/login', 'AuthController@login');

$router->get('/logout', 'AuthController@logout');

$router->get('/', 'PostController@index', ['AuthMiddleware']);
$router->get('/create-post', 'PostController@create', ['AuthMiddleware']);
$router->post('/create-post', 'PostController@store', ['AuthMiddleware']);

$router->post('/delete-post/{id}', 'PostController@delete', ['AuthMiddleware']);
$router->post('/delete-comment/{id}', 'CommentController@delete', ['AuthMiddleware']);

$router->get('/edit-post/{id}', 'PostController@edit', ['AuthMiddleware']);
$router->post('/update-post', 'PostController@update', ['AuthMiddleware']);

$router->post('/create-comment/{id}', 'CommentController@store', ['AuthMiddleware']);

// $router->get('/edit/{name}', 'PostController@edit');


$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);