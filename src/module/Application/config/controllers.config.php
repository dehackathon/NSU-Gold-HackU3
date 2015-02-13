<?php

return array(
    'invokables' => array(
    ),
    'factories' => array(
        'Application\Controller\Index' => 'Application\Controller\Factory\IndexControllerFactory',
        'Application\Controller\ShoppingList' => 'Application\Controller\Factory\ShoppingListControllerFactory',
        'Application\Controller\Expenses' => 'Application\Controller\Factory\ExpensesControllerFactory',
        'Application\Controller\Register' => 'Application\Controller\Factory\RegisterControllerFactory',
        'Application\Controller\Login' => 'Application\Controller\Factory\LoginControllerFactory',
        'Application\Controller\ForgotPassword' => 'Application\Controller\Factory\ForgotPasswordControllerFactory',
        'Application\Controller\Calendar' => 'Application\Controller\Factory\CalendarControllerFactory',
        'Application\Controller\Home' => 'Application\Controller\Factory\HomeControllerFactory',
    ),
);