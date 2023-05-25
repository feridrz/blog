<?php
namespace App\core;
use PDO;

class Database
{

    public $db;

    public function __construct()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];

        $this->db = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";charset=utf8", $dbUser, $dbPass);
    }
}
