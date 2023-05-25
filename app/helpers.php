<?php
use Jenssegers\Blade\Blade;


function view($template, $data = [])
{
    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';

    $blade = new Blade($views, $cache);

    echo $blade->render($template, $data);
}
function redirect($url)
{
    header("Location: $url");
    exit;
}

function sendResponse($statusCode, $message, $redirectUrl = null)
{
    http_response_code($statusCode);
    echo json_encode(['message' => $message]);

    if ($redirectUrl) {
        header("Location: $redirectUrl");
        exit;
    }
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}

function handleException($e)
{
    sendResponse(500, 'Internal Server Error');
}