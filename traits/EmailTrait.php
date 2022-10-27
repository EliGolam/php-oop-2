<?php

  trait EmailTrait {
    private string $email;

    private function setEmail(string &$email) {
      $this->email = $email;
    }

    public function getEmail() {
      return $this->email;
    }
  }

?>