<?php

return array(
    'routes' => array(
        'register' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/register[/:action]',
                'defaults' => array(
                    'controller' => 'Application\Controller\Register',
                    'action'     => 'index',
                ),
            ),
        ),
        'forgot-password' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/forgot-password',
                'defaults' => array(
                    'controller' => 'Application\Controller\ForgotPassword',
                    'action'     => 'index',
                ),
            ),
        ),
        'login' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/[login[/:action]]',
                'defaults' => array(
                    'controller' => 'Application\Controller\Login',
                    'action'     => 'index',
                ),
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/home',
                'defaults' => array(
                    'controller' => 'Application\Controller\Home',
                    'action'     => 'index',
                ),
            ),
        ),
        'shopping-list' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/shopping-list[/:action]',
                'defaults' => array(
                    'controller' => 'Application\Controller\ShoppingList',
                    'action'     => 'index',
                ),
            ),
        ),
        'expenses' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/expenses[/:action]',
                'defaults' => array(
                    'controller' => 'Application\Controller\Expenses',
                    'action'     => 'index',
                ),
            ),
        ),
        'calendar' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/calendar',
                'defaults' => array(
                    'controller' => 'Application\Controller\Calendar',
                    'action'     => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'type' => array(
                    'type' => 'segment',
                    'options' => array(
                        'route' => '/type[/:type]',
                        'defaults' => array(
                            'action' => 'type',
                        )
                    ),
                ),
                'events' => array(
                    'type' => 'segment',
                    'options' => array(
                        'route' => '/events',
                        'defaults' => array(
                            'action' => 'events',
                        )
                    ),
                ),
            ),

        ),
        'user-list' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/user-list[/:action]',
                'defaults' => array(
                    'controller' => 'Application\Controller\UserList',
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