<?php
namespace App\interfaces;
interface IAuthService
{
    public function login(string $username, string $password): bool;
}
