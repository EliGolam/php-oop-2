<?php

  trait PropertyRestriction {
    public function __set($key, $value) {
      throw new Exception("Cannot add new property $key to instance of " . __CLASS__);
    }
  }

?>