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
        $members = $this->dbMapper->fetchMembers();
        $this->layout()->setVariable('members', $members);

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
    public function uploadAction()
    {
      return new viewModel();
    
    }
    
    /*
    copied from shopping list
    
    public function addAction()
    {
        $shoppinglist = $this->dbMapper->addShoppingListItem(array(
            'item' => $this->getRequest()->getQuery('item'),
            'username' => $this->getRequest()->getQuery('username')
        ));

        $data = array(
            'success' => true,
            'data' => array(
                'id' => $shoppinglist->getId(),
                'item' => $shoppinglist->getItem(),
                'username' => $shoppinglist->getUserName()
            )
        );

        return new JsonModel($data);
    }
    */
}
