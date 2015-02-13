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
        $statement = $this->dbAdapter->query("SELECT * FROM `shoppinglist` where `username` = '$username'");
        $result = $statement->execute();

        $baseEntity = "\\Application\\Entity\\ShoppingListEntity";
        return $this->hydrateResults($result, $baseEntity);
   	}

    public function compareLogin($params)
    {
        try {
            $baseEntity = "\\Application\\Entity\\AdminUserEntity";

            $statement = $this->dbAdapter->query("SELECT * FROM admin_table where username=\"" . $params['username'] . "\"");
            $result = $statement->execute();

            /** @var \Application\Entity\AdminUserEntity $user */
            $user = $this->hydrateResults($result, $baseEntity);
        } catch (\Exception $e) {
            return false;
        }

        if (isset($user[0]) && ($user[0]->getAdminPassword() == $params['password']) or ($user[0]->getPassword() == $params['password'])) {
            return true;
        } else {
            return false;
        }
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

    public function deleteShoppingListItem($id)
    {
        $statement = $this->dbAdapter->query("DELETE FROM shoppinglist WHERE id = $id");
        $result = $statement->execute();

        return $result;
    }

    public function insertNewUser(array $reg)
    {
        try {
            $statement = $this->dbAdapter->query("INSERT INTO admin_table(name,email,username,admin_password,password)
        VALUES('".$reg['name']."','".$reg['email']."','".$reg['regusername']."','".$reg['adminpass']."','".$reg['regpassword']."')");


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