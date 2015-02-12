<?php

	namespace ApplicationEntity;
	
	class ShoppingListEntity{
		private $username;
		private $shoppinglist = array();
		


    public function getUserName($username)
    {
        return $this->username;
    }

    public function setUserName($username)
    {
        $this->username = $usename;
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
		
		
		