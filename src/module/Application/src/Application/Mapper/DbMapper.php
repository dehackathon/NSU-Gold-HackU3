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

    private function hydrateResults($results, $baseObject)
    {
        $returnValues = array();

        $results->buffer();

        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ReflectionHydrator, new $baseObject);
            $resultSet->initialize($results);

            foreach ($resultSet as $nextResult) {
                $returnValues[] = $nextResult;
            }
        }
        return $returnValues;
    }
}