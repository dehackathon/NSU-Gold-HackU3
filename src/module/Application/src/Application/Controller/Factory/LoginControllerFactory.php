<?php

namespace Application\Controller\Factory;

use Application\Controller\LoginController;
use Application\Mapper\DbMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = new DbMapper($sm);

        return new LoginController($mapper);
    }
}