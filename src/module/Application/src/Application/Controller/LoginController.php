<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Mapper\DbMapper;

class LoginController extends AbstractActionController
{
    /** @var DbMapper */
    private $dbMapper;

    public function __construct(DbMapper $mapper)
    {
        $this->dbMapper = $mapper;
    }

    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);

        return $view;
    }

    public function postAction()
    {
        $params = $this->params()->fromPost();

        if( $this->dbMapper->compareLogin($params))
        {
            $this->redirect()->toRoute('home');

        }
        else{

             $this->redirect()->toRoute('login');
        }
    }
}






