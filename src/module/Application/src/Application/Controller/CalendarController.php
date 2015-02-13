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
        $data = $this->getMockedEvents();
        return new JsonModel($data);
    }

    private function getMockedEvents()
    {
        return array(
            'success' => 1,
            'result' => array(
                array(
                    'id' => 2,
                    'title' => 'Hackathon: 150 Granby Street, Norfolk, VA 23510',
                    'url' => 'http://hackathon.dominionenterprises.com/',
                    'class' => 'event-important',
                    'start' => 1423832400000,
                    'end' => 1423864800000
                ),
                array(
                    'id' => 3,
                    'title' => 'Party!',
                    'url' => 'https://www.google.com/maps/place/Field+Guide/@36.852047,-76.289591,17z/data=!3m1!4b1!4m2!3m1!1s0x89ba981211ff40c9:0x192b179c66f54eda',
                    'class' => 'event-info',
                    'start' => 1423875600000,
                    'end' => 1423889880000
                ),
                array(
                    'id' => 4,
                    'title' => 'Event 1',
                    'url' => 'http://example.com',
                    'class' => 'event-special',
                    'start' => 1423845900000,
                    'end' => 1423853100000
                ),
                array(
                    'id' => 5,
                    'title' => 'Event 1',
                    'url' => 'http://example.com',
                    'class' => 'event-success',
                    'start' => 1423845900000,
                    'end' => 1423853100000
                ),
                array(
                    'id' => 6,
                    'title' => 'Event 1',
                    'url' => 'http://example.com',
                    'class' => 'event-warning',
                    'start' => 1423845900000,
                    'end' => 1423853100000
                )
            )
        );
    }
}
