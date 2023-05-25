<?php
namespace App\repositories;
use PDO;
class AuthRepository {
    private $db;
  
    public function __construct($db) {
      $this->db = $db;
    }
  
    public function login($username, $password)
    {
      $query = "SELECT * FROM users WHERE name = :username";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  
  }
  