<?php

namespace Application\Mapper;

use Application\Db\dbAdapter;
use Application\Entity\ShoppingListEntity;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;


class DbMapper
{
    private $dbAdapter;

    public function __construct(ServiceLocatorInterface $sm)
    {
        $this->dbAdapter = new dbAdapter($sm);
    }

    public function fetchAllAdminUsers()
    {
        $baseEntity = "\\Application\\Entity\\AdminUserEntity";

        $statement = $this->dbAdapter->query("SELECT * FROM admin_table");
        $result = $statement->execute();

        return $this->hydrateResults($result, $baseEntity);
    }


   public function fetchShoppingList($username)
   	{
        /** @var \Application\Entity\ShoppingListEntity $shoppinglist */
   	   $shoppinglist = new \Application\Entity\ShoppingListEntity();
   	   $items = array('glue','paste','toys','pizza','hotdog');
   	   $shoppinglist->setUserName($username);
   	   $shoppinglist->setShoppingList($items);
   	   
   	   return $shoppinglist;
   	   
   	}

    public function addShoppingListItem($data)
    {
        /** @var \Application\Entity\ShoppingListEntity $shoppinglist */
        $shoppinglist = new ShoppingListEntity();
        //$shoppinglist->setUserName($data['username']);
        //$shoppinglist->setItem($data['item']);
        $item = $data['item'];
        $username = $data['username'];

        $statement = $this->dbAdapter->query("INSERT INTO shoppinglist(`item`, `username`) VALUES('$item', '$username')");
        $result = $statement->execute();

        $shoppinglist->setItem($item);
        $shoppinglist->setUserName($username);
        $shoppinglist->setId($result->getGeneratedValue());

        return $shoppinglist;
    }

    public function insertNewUser(array $reg)
    {
        try {
            $statement = $this->dbAdapter->query("INSERT INTO admin_table(name,email,username,admin_password,password)
        VALUES('".$reg['name']."','".$reg['email']."','".$reg['username']."','".$reg['admin_password']."','".$reg['password']."')");


            $statement->execute();
            return true;
        }
        catch(\Exception $e){
            return false;

        }
    }

    private function hydrateResults($results, $baseObject)
    {
        $returnValues = array();


        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $results->buffer();
            $resultSet = new HydratingResultSet(new ReflectionHydrator, new $baseObject);
            $resultSet->initialize($results);

            foreach ($resultSet as $nextResult) {
                $returnValues[] = $nextResult;
            }
        }
        return $returnValues;
    }
}