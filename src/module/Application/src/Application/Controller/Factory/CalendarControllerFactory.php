<?php

namespace Application\Controller\Factory;

use Application\Controller\CalendarController;
use Application\Mapper\DbMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CalendarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = new DbMapper($sm);

        return new CalendarController($mapper);
    }
}