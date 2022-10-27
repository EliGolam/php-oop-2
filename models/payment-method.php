<?php 

  require_once __DIR__ . "/../traits/propertyRestriction.php";

  class PaymentMethod {
    use PropertyRestriction; 

    private int $id; 
    private static int $totalIDs = 0;

    private int $user_id;
    private string $name; 
    
    function __construct(User &$user, string $name = '') {
      PaymentMethod::$totalIDs += 1;
      $this->id = PaymentMethod::$totalIDs;

      $this->setName($name);
      $this->user_id = $user->getId();
    }

    public function setName(string &$name) {
      $this->name = $name;
    }
    

  }

?>