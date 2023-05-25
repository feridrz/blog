<?php

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
require_once 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();

require_once 'dependencies.php';
require_once __DIR__ . '/../helpers.php';