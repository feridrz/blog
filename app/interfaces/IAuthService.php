<?php
namespace App\interfaces;
interface IAuthService
{
    public function login(string $email, string $password): bool;
}
