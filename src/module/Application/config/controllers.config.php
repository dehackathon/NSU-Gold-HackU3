<?php

return array(
    'invokables' => array(
        'Application\Controller\ShoppingList' => 'Application\Controller\ShoppingListController',
        'Application\Controller\Expenses' => 'Application\Controller\ExpensesController',
        'Application\Controller\Register' => 'Application\Controller\RegisterController',
        'Application\Controller\Login' => 'Application\Controller\LoginController',
        'Application\Controller\ForgotPassword' => 'Application\Controller\ForgotPasswordController',
    ),
    'factories' => array(
        'Application\Controller\Index' => 'Application\Controller\Factory\IndexControllerFactory',
    ),
);