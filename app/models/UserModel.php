<?php
namespace App\models;

class UserModel {
    private $id;
    private $name;
    private $email;
    private $password;
    private $image;
  
    public function __construct($id, $name, $email, $image) {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->image = $image;
    }
  
    public function getId() {
      return $this->id;
    }
  
    public function setId($id) {
      $this->id = $id;
    }
  
    public function getName() {
      return $this->name;
    }
  
    public function setName($name) {
      $this->name = $name;
    }
  
    public function getEmail() {
        return $this->email;
      }
    
      public function setEmail($email) {
        $this->email = $email;
      }

      public function getImage() {
        return $this->image;
      }
    
      public function setImage($image) {
        $this->image = $image;
      }
  }
  