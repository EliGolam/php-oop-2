<?php

  trait Password {
    private string $password = '';

    public function createNewPassword($newPassword, $oldPassword = '') {
      if (strlen($this->password) == 0 || $this->verifyPassword($oldPassword)) {
        $this->setPassword($newPassword);
      }
    }

    private function setPassword(&$password) {
      $this->password = password_hash($password,  PASSWORD_DEFAULT);
    }

    public function verifyPassword ($_password) : bool {
      return password_verify($_password, $this->password);
    } 
  }

?>