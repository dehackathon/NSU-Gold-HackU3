<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Mapper\DbMapper;
use Application\User\UserEntity;
use Application\User\UserMapper;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;

class IndexController extends AbstractActionController
{
    /** @var DbMapper */
    private $dbMapper;

    public function __construct(DbMapper $mapper)
    {
        $this->dbMapper = $mapper;
    }

    public function indexAction()
    {
       

        return new ViewModel();
    }
}
