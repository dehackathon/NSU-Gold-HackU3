<?php

return array(
    'invokables' => array(
        'Application\Controller\ShoppingList' => 'Application\Controller\ShoppingListController',
        'Application\Controller\Expenses' => 'Application\Controller\ExpensesController'
    ),
    'factories' => array(
        'Application\Controller\Index' => 'Application\Controller\Factory\IndexControllerFactory',
    ),
);