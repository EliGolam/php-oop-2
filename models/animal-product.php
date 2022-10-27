<?php

  require_once __DIR__ . '/../traits/property-restriction.php';

  class AnimalProduct {

    use PropertyRestriction;

    const PASSWORD = 'myPassword';

    // Properties
    private int $id; 
    private static int $totalIDs = 0;

    protected string $name;
    protected string $brand;
    private float $price = 100;
    protected float $discount = 0;
    protected bool $inStock = true;
    protected array $tags = [];
    
    function __construct() {
      AnimalProduct::$totalIDs += 1;
      $this->id = AnimalProduct::$totalIDs;
    }

    // Methods
    public function getId () {
      return $this->id;
    }

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


    public function setBrand(string $_brand) {
      $_brand = trim($_brand);
      if (strlen($_brand) < 80) {
        $this->brand = $_brand;
      } 
      else {
        throw new Exception ("The brand is too long (max 80 characters)");
      }
    }

    public function getBrand() : string {
      return $this->brand;
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

    /* Unknown Bug *********************************************/
    public function addTag (string $tag) {
      $tag = trim($tag);


      echo "DEBUG - isTagPresent" . array_search($tag, $this->tags, true) . "<br>";

      // If tag is already present, we don't need to add it. 
      if ($this->isTagPresent($tag) == false) {
        // If tag is too long, we don't add it 
        if (strlen($tag) > 100) {
          throw new Exception("Tag name is too long (max 100 characters)");
          return null;
        }

        $this->tags[] = $tag;
      }
    }
    /* Unknown Bug *********************************************/

    public function removeTag (string $tag) {
      $tag = trim($tag);
      $key = $this->isTagPresent($tag);

      if($key != false) {
        unset($this->tags[$key]);
        array_values($this->tags);
      }
    }

    public function getProductTags () : array {
      return $this->tags;
    }


    // Static Methods
    private function isTagPresent ($tag) {
      $result = array_search($tag, $this->tags);
      echo "Test Result - $result <br>";
      return $result;
    }

  }

?>