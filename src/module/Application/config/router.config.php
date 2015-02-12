<?php

return array(
    'routes' => array(
        'register' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/register',
                'defaults' => array(
                    'controller' => 'Application\Controller\Register',
                    'action'     => 'index',
                ),
            ),
        ),
        'login' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/login',
                'defaults' => array(
                    'controller' => 'Application\Controller\Login',
                    'action'     => 'index',
                ),
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ),
            ),
        ),
        'shopping-list' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/shopping-list',
                'defaults' => array(
                    'controller' => 'Application\Controller\ShoppingList',
                    'action'     => 'index',
                ),
            ),
        ),
        'expenses' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/expenses',
                'defaults' => array(
                    'controller' => 'Application\Controller\Expenses',
                    'action'     => 'index',
                ),
            ),
        ),
        // The following is a route to simplify getting started creating
        // new controllers and actions without needing to create a new
        // module. Simply drop new controllers in, and you can access them
        // using the path /application/:controller/:action
        'application' => array(
            'type'    => 'Literal',
            'options' => array(
                'route'    => '/application',
                'defaults' => array(
                    '__NAMESPACE__' => 'Application\Controller',
                    'controller'    => 'Index',
                    'action'        => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'default' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:controller[/:action]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        'defaults' => array(
                        ),
                    ),
                ),
            ),
        ),
    ),
);