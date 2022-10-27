<?php

  require_once __DIR__ . '/../traits/ExpiryDate.php';

  class CreditCard {

    use ExpiryDate;

    private int $id; 
    private static int $totalIDs = 0;
    
    private int $user_id;
    
  }

?>