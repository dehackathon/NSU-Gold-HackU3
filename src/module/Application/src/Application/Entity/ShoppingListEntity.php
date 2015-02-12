<?php

	namespace Application\Entity;
	
	class ShoppingListEntity{
		private $username;
		private $shoppinglist = array();
		


    public function getUserName($username)
    {
        return $this->username;
    }

    public function setUserName($username)
    {
        $this->username = $username;
    }
    
      public function getShoppingList($shoppinglist)
    {
        return $this->shoppinglist;
    }

    public function setShoppingList($shoppinglist)
    {
        $this->shoppinglist = $shoppinglist;
    }

}
		
		
		