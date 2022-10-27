<?php

  require_once __DIR__ . '/user.php';

  require_once __DIR__ . '/../traits/EmailTrait.php';

  class RegisteredUser extends User {

    use EmailTrait;

    private string $firstName;
    private string $middleName;
    private string $lastName;
    private bool $isSubscribed;

    private string $password;
    private $phoneNumber;
    private $userName;

    function __construct(User &$user) {
      
    }

    public function getName() {
      return $this->firstName . " " . $this->middleName . " " . $this->lastName;
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

    public function verifyPassword ($_password) : bool {
      return password_verify($_password, $this->password);
    }

    private function setPassword(&$newPassword) {
      $this->password = password_hash($newPassword,  PASSWORD_DEFAULT);
    }

    private function setUserName(&$userName) {
      $this->userName = $userName;
    }
  }

?>