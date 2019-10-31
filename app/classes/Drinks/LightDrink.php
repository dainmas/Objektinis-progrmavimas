<?php

namespace App\Drinks;

class LightDrink extends Drink {
  
   public function drink() {
    $this->setAmount($this->getAmount() - 100);
}

 
}
