<?php
  require_once __DIR__ . '/payment-method.php';
  require_once __DIR__ . '/user.php';

  require_once __DIR__ . '/../traits/ExpiryDate.php';
  require_once __DIR__ . '/../traits/EmailTrait.php';

  class CreditCard extends PaymentMethod {

    use ExpiryDate;

    private int $cvv; 

    function __construct(User &$user, int $expiryYear, int $expiryMonth, int $cvv, string $name = '') {
      parent::__construct($user, $name);

      $date = "$expiryYear-$expiryMonth-01";
      $this->setExpiryDate($date);

      $this->cvv = $cvv;
    }

    // ADD IS VALID FUNCTION BOOL
  }


  class PayPal extends PaymentMethod {

    use EmailTrait; 

    function __construct(User &$user, string $email, string $name = '') {
      parent::__construct($user, $name);

      $this->setEmail($email);
    }
  }
  

?>