<?php
namespace App\controllers;
use App\core\Controller;
use App\interfaces\IAuthService;
use App\services\AuthService;

class ImprintController extends Controller
{

    public function __construct()
    {
        hasAccess();
    }
    public function index()
    {
        view('imprint');
    }
}