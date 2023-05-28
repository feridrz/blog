<?php
use App\controllers\AuthController;
use App\controllers\CommentController;
use App\controllers\ImprintController;
use App\controllers\PostController;

$route->get('/', [PostController::class, 'index']);

$route->get('/imprint', [ImprintController::class, 'index']);

$route->get('/login', [AuthController::class, 'loginView']);
$route->post('/login', [AuthController::class, 'login']);
$route->get('/logout', [AuthController::class, 'logout']);

$route->get('/create-post', [PostController::class, 'create']);
$route->post('/create-post', [PostController::class, 'store']);
$route->post('/delete-post/{id}', [PostController::class, 'delete']);
$route->get('/edit-post/{id}', [PostController::class, 'edit']);
$route->post('/update-post', [PostController::class, 'update']);

$route->post('/create-comment/{id}', [CommentController::class, 'store']);
$route->post('/delete-comment/{id}', [CommentController::class, 'delete']);