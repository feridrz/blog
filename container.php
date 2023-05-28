<?php

use DI\ContainerBuilder;


$containerBuilder = new \DI\ContainerBuilder();

$containerBuilder->addDefinitions([
    'HomeController' => \DI\autowire(),
    'Test' => \DI\autowire(),
    'PostRepository' => \DI\autowire(),
    'CommentRepository' => \DI\autowire(),
    'AuthRepository' => \DI\autowire(),
    'AuthService' => \DI\autowire(),
    'CommentService' => \DI\autowire(),
    'PostController' => \DI\autowire(),
    'CommentController' => \DI\autowire(),
    'AuthController' => \DI\autowire(),
]);

return $containerBuilder->build();

