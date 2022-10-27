<?php 

  require_once __DIR__ . "/animal-product-types.php";
  require_once __DIR__ . "/user.php";

  class Purchase {

    private string $id;
    private string $product_id;
    private string $user_id;
    private bool $isRegisteredUser;
    private bool $isPaid;
    private float $priceToPay;

    function __construct(AnimalProduct &$product, User &$user, ?bool $paid = false) {
      $this->id = rand(1, 1000);
      $this->product_id = $product->getId();
      $this->user_id = $user->getId();
      $this->isRegisteredUser = $user->getRegStatus();

      $this->priceToPay = number_format($product->getPrice());

      if ($this->isRegisteredUser) {
        $this->priceToPay -= $this->priceToPay * 0.2; 
      }
      $this->isPaid = $paid;
    }
  }

?>