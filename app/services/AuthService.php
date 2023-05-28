<?php
namespace App\services;
use App\interfaces\IAuthService;
use App\repositories\AuthRepository;


class AuthService implements IAuthService
{
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(string $email, string $password) : bool
    {
        $user = $this->repository->login($email, $password);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            $_SESSION['id'] = $user['id'];

            session_regenerate_id(true);
            return true;
        }
        return false;
    }

}