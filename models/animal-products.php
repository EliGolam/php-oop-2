<?php

  class AnimalProduct {

    const PASSWORD = 'myPassword';

    // Properties
    protected string $name;
    private float $price = 100;
    protected float $discount = 0;
    protected bool $inStock = true;
    
    
    

    // Methods
    public function setName(string $_name) {
      $_name = trim($_name);
      if (strlen($_name) < 80) {
        $this->name = $_name;
      } 
      else {
        throw new Exception ("The name is too long (max 80 characters)");
      }
    }

    public function getName() : string {
      return $this->name;
    }


    protected function setPrice(float $_price) {
      $this->price = $_price;
    }

    public function getPrice() : float {
      $price = $this->price;
      return $price - ($price * $this->discount);
    }

    public function getOriginalPrice() : float {
      return $this->price;
    }


    public function setDiscount(float $_discount, string $password) {
      if(self::PASSWORD != $password) return null;
      if ($_discount < 0 || $_discount >= 100) return null;

      // If discount value is under 1 we consider it in the decimal form
      if ($_discount < 1) {
        $this->discount = $_discount;
      }
      // If discount is above 1 we consider it the percentage
      else {
        $this->discount = $_discount / 100;
      }
    }




  }

?>