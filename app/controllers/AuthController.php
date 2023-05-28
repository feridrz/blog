<?php
namespace App\controllers;
use App\core\Controller;
use App\interfaces\IAuthService;
use App\services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function loginView()
    {
        if (isLoggedIn()) {
            redirect(self::HOME);
        }
        view(self::LOGIN);
    }
    public function login()
    {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (empty($username) || empty($password)) {
            $_SESSION['error_message'] = 'Please enter a username and password';
             redirect(self::LOGIN);
        }

        if ($this->authService->login($username, $password)) {
            redirect(self::HOME);
        } else {
            $_SESSION['error_data'] = 'Invalid username or password';
            redirect(self::LOGIN);
        }

    }
    


    public function logout()
    {
        session_destroy();

        redirect(self::HOME);
    }
}