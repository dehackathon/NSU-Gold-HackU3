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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Mapper\DbMapper;

class ExpensesController extends AbstractActionController
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
        //$users = $this->dbMapper->fetchAllAdminUsers();
        $email = 'bob@nsu.com';
        $collection = $this->dbMapper->fetchMembers($email);

        $view = new ViewModel();
        $view->setVariable(
            'email',
            !empty($collection) ? $collection[0]->getEmail() : $email
        );
        $view->setVariable('listCollection', $collection);

        return $view;
    }
}
