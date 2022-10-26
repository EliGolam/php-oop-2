<?php

  class AnimalProducts {

    // Properties
    private float $_price;


    // Methods
    protected function setPrice(float $newPrice) {
      $this->_price = $newPrice;
    }

    public function price() : float {
      return $this->_price;
    }
  }

?>