<?php

  trait ExpiryDate {
    private string $expiryDate;
    
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
  }

?>