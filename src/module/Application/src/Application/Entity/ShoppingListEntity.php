<?php

namespace Application\Entity;

class ShoppingListEntity{
    private $id;
    private $username;
    private $shoppinglist = array();
    private $item;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;
    }

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
		
		
		