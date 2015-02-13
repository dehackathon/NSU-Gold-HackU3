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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ShoppingListController extends AbstractActionController
{
    private $dbMapper;

    public function __construct(DbMapper $mapper)
    {
        $this->dbMapper = $mapper;
    }

    public function indexAction()
    {
        $shoppinglist = $this->dbMapper->fetchShoppingList('Aaron');

        $view = new ViewModel();
        $view->setVariable('username', $shoppinglist->getUserName());
        $view->setVariable('shoppinglist', $shoppinglist->getShoppingList());

        return $view;
    }

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

    public function removeAction()
    {
        $data = array(
            'success' => true,
            'data' => array()
        );

        return new JsonModel($data);
    }

}


