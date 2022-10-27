<?php

  // Import models
  require_once __DIR__ . '/../models/animal-product.php';
  require_once __DIR__ . '/../models/animal-product-types.php';
  require_once __DIR__ . '/../models/user.php';
  require_once __DIR__ . '/../models/purchase.php';
  require_once __DIR__ . '/../models/payment-methods.php';

  $testProduct = new AnimalProduct();
  echo $testProduct->getPrice();

  $testProduct->setName("New Item");
  $testProduct->setDiscount(0.3, "myPassword");

  var_dump($testProduct);
  echo $testProduct->getPrice();
  echo $testProduct->getOriginalPrice();

  $testProduct->setBrand("New Test Brand");
  $testProduct->addTag("Cat Food");
  $testProduct->addTag("Litter");
  $testProduct->addTag("Cat Food");
  
  var_dump($testProduct);
  $testProduct->removeTag("Litter");
  var_dump($testProduct);

  $testFood = new FoodProduct();
  var_dump($testFood);

  $testFood->setExpiryDate("2028-06-12");
  var_dump($testFood);

  $testFood->setExpiryDate("2027/05/21");
  var_dump($testFood);

  echo $testFood->getExpiryDate() . "<br>";
  echo $testFood->getExpiryDate("year") . "<br>";
  echo $testFood->getExpiryDate("m") . "<br>";
  echo $testFood->getExpiryDate("D") . "<br>";
  echo $testFood->getExpiryDate("random") . "<br>";

  $user1 = new User(); 
  var_dump($user1);

  $user1->register("Miranda Lawson", "m.lawson@cerberus.com", "massEffect3doesntExist!");
  var_dump($user1);

  $user1->getRegStatus();
  $user1->getName();
  $user1->getId();

  var_dump($user1->verifyPassword("wrongPassword"));
  var_dump($user1->verifyPassword("massEffect3doesntExist!"));

  $testPurchase = new Purchase($testProduct, $user1);
  var_dump($testPurchase);

  $testPurchaseFood = new Purchase($testFood, $user1);
  var_dump($testPurchaseFood);

  $testCreditCard = new CreditCard($user1, 2027, 7, 328, "Miranda's Cerberus Card");
  var_dump($testCreditCard);

  $testPaypal = new PayPal($user1, $user1->getEmail());
  var_dump($testPaypal);

  $user2 = new User(); 
  var_dump($user2);
  $user3 = new User(); 
  var_dump($user3);
  $user4 = new User(); 
  var_dump($user4);

  $user1->createNewPassword("IreallyHateME3Ending!!", "massEffect3doesntExist!");
  var_dump($user1);
  var_dump($user1->verifyPassword("massEffect3doesntExist!"));
  var_dump($user1->verifyPassword("IreallyHateME3Ending!!"));

?>