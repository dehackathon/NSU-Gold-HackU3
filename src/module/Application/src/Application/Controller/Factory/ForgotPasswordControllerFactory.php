<?php

namespace Application\Controller\Factory;

use Application\Controller\ForgotPasswordController;
use Application\Mapper\DbMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ForgotPasswordControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = new DbMapper($sm);

        return new ForgotPasswordController($mapper);
    }
}