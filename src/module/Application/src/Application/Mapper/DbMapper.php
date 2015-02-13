<?php

namespace Application\Mapper;

use Application\Db\dbAdapter;
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

    public function compareLogin($params)
    {
        try {
            $baseEntity = "\\Application\\Entity\\AdminUserEntity";

            $statement = $this->dbAdapter->query("SELECT * FROM admin_table where username=\"" . $params['username'] . "\"");
            $result = $statement->execute();

            /** @var \Application\Entity\AdminUserEntity $user */
            $user = $this->hydrateResults($result, $baseEntity);
        }catch (\Exception $e){
            return false;
        }

        if(($user[0]->getAdminPassword()==$params['password']) or ($user[0]->getPassword()==$params['password'])){
            return true;
        }
        else {
            return false;
        }
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