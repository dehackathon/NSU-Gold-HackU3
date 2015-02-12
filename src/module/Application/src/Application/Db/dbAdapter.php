<?php

namespace Application\Db;

use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceLocatorInterface;

class dbAdapter extends Adapter
{
    public function __construct(ServiceLocatorInterface $sm)
    {
        $config = $sm->getServiceLocator()->get('config')['db'];
        parent::__construct($config);
    }
}
 