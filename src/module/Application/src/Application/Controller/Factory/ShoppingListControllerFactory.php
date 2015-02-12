<?php

namespace Application\Controller\Factory;

use Application\Controller\ShoppingListController;
use Application\Mapper\DbMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ShoppingListControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = new DbMapper($sm);

        return new ShoppingListController($mapper);
    }
}