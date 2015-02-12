<?php

	namespace Application\Entity;
	
	class ShoppingListEntity{
		private $username;
		private $shoppinglist = array();
		


    public function getUserName()
    {
        return $this->username;
    }

    public function setUserName($username)
    {
        $this->username = $username;
    }
    
      public function getShoppingList()
    {
        return $this->shoppinglist;
    }

    public function setShoppingList($shoppinglist)
    {
        $this->shoppinglist = $shoppinglist;
    }

}
		
		
		