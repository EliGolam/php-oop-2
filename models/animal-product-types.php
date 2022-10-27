<?php

  require_once __DIR__ . '/animal-product.php';
  require_once __DIR__ . '/../traits/ExpiryDate.php';


  /* FOOD PRODUCT */
  class FoodProduct extends AnimalProduct {

    use ExpiryDate;

    private string $type = "food";
    
    private array $ingredients = [];  


    public function setIngredients($_ingredient) {
      $_ingredient = strtolower($_ingredient);

      if (in_array($_ingredient, $this->ingredients, true) == false) {
        $this->ingredients[] = $_ingredient;
      }
    }
  }


  /* Toy Product */

?>