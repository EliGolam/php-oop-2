<?php

  class User {

    private int $id; // Temporary rand for testing. Not intended for production
    private string $firstName;
    private string $middleName;
    private string $lastName;
    private bool $isSubscribed;

    private $password;
    private string $email;
    private $phoneNumber;
    private $userName;

    function __construct() {
      $this->id = rand(1, 1000);
      $this->isSubscribed = false;
    }


    public function register(string $_fullName, string $_email, string $_password, string $_userName = null) {
      $this->setName($_fullName);
      $this->setEmail($_email);
      $this->setPassword($_password);
      $this->setUserName($_userName);
      $this->isSubscribed = true;
    }

    public function getId() {
      return $this->id;
    }

    public function getName() {
      return $this->firstName . " " . $this->middleName . " " . $this->lastName;
    }

    public function getRegStatus() {
      return $this->isSubscribed;
    }

    public function verifyPassword ($_password) : bool {
      return password_verify($_password, $this->password);
    } 
    

    private function setName(&$name) {
      $nameParts = explode(" ", $name);
      $len = count($nameParts);

      $this->firstName = $nameParts[0];
      $this->lastName = $nameParts[$len - 1];
      unset($nameParts[$len - 1]);
      unset($nameParts[0]);
      $this->middleName = implode(" ", $nameParts);
    }

    private function setEmail(string &$email) {
      $this->email = $email;
    }

    private function setPassword(&$newPassword) {
      $this->password = password_hash($newPassword,  PASSWORD_DEFAULT);
    }

    private function setUserName(&$userName) {
      $this->userName = $userName;
    }
  }

?>