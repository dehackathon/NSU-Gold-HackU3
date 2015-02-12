<?php

namespace Application\Controller\Factory;

use Application\Controller\RegisterController;
use Application\Mapper\DbMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = new DbMapper($sm);

        return new RegisterController($mapper);
    }
}