<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Utility\Login;
use Application\ViewModel\TypeViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Mapper\DbMapper;

class CalendarController extends AbstractActionController
{
    /** @var DbMapper */
    private $dbMapper;

    public function __construct(DbMapper $mapper)
    {
        $this->dbMapper = $mapper;
    }

    public function indexAction()
    {
        if (!Login::isLoggedIn()) {
            $this->redirect()->toRoute('login');
        }
        //$users = $this->dbMapper->fetchAllAdminUsers();

        return new ViewModel();
    }

    public function typeAction()
    {
        $type = $this->params()->fromRoute('type');
        return new TypeViewModel($type);
    }

    public function eventsAction()
    {
        $data = array(
            'success' => 1,
            'result' => array(
                array(
                    'id' => 2,
                    'title' => 'Event 1',
                    'url' => 'http://example.com',
                    'class' => 'event-important',
                    'start' => 1423803600000,
                    'end' => 1423803600100
                )
            )
        );
        return new JsonModel($data);
    }
}
