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
use Zend\View\View;

class RegisterController extends AbstractActionController
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

    public function postAction()
    {

        $view = new ViewModel();
        $view->setTerminal(true);

//        $params = $this->params()->fromQuery();
        $user = array(
            'name' => 'Aaron',
            'email' => 'aa@yahoo.com',
            'username' => 'username',
            'admin_password' => 'password',
            'password' => 'password2'
        );

       if( $this->dbMapper->insertNewUser($user))
       {

           $this->redirect()->toRoute('login');
       }
        else{

            $this->redirect()->toRoute('register');
        }
    }
}
