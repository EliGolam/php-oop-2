<?php

  require_once __DIR__ . '/animal-product.php';

  /* FOOD PRODUCT */
  class FoodProduct extends AnimalProduct {

    private string $expiryDate;
    private array $ingredients = [];  

    public function setExpiryDate(string $_date) {
      $newExpiryDate = date_create($_date);
      $this->expiryDate = date_format($newExpiryDate, "Y-m-d");
    }

    public function getExpiryDate (string $option = "full") {
      $date = DateTime::createFromFormat("Y-m-d", $this->expiryDate);
      $option = strtolower($option);

      if ($option == 'full') {
        return $this->expiryDate;
      }
      else {
        $formatOption = substr($option, 0, 1);
        try {
          return $date->format($formatOption);
        } catch (Exception $e) {
          echo 'Wrong option: ' . $e->getMessage() . "<br>";
        }
          
      }
    }


    public function setIngredients($_ingredient) {
      $_ingredient = strtolower($_ingredient);

      if (in_array($_ingredient, $this->ingredients, true) == false) {
        $this->ingredients[] = $_ingredient;
      }
    }
  }


  /* Toy Product */

?>