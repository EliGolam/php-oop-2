<?php

  require_once __DIR__ . '/../traits/EmailTrait.php';
  require_once __DIR__ . '/../traits/PasswordTrait.php';
  require_once __DIR__ . '/../traits/propertyRestriction.php';

  class User {

    use EmailTrait;
    use Password;
    use PropertyRestriction;

    private int $id; // Temporary value for testing. Not intended for production
    private static int $totalIDs = 0;

    private string $firstName;
    private string $middleName;
    private string $lastName;
    private bool $isSubscribed;

    private $phoneNumber;
    private $userName;

    private array $paymentMethod = [];

    // Add profile image, adress, separate in registered user

    function __construct() {
      User::$totalIDs += 1;
      $this->id = User::$totalIDs;
      $this->isSubscribed = false;
    }


    public function register(string $_fullName, string $_email, string $_password, string $_userName = null) {
      $this->setName($_fullName);
      $this->setEmail($_email);
      $this->createNewPassword($_password);
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
    

    private function setName(&$name) {
      $nameParts = explode(" ", $name);
      $len = count($nameParts);

      $this->firstName = $nameParts[0];
      $this->lastName = $nameParts[$len - 1];
      unset($nameParts[$len - 1]);
      unset($nameParts[0]);
      $this->middleName = implode(" ", $nameParts);
    }


    private function setUserName(&$userName) {
      $this->userName = $userName;
    }
  }

?>