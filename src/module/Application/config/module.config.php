<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => require 'router.config.php',
    'service_manager' => require 'service_manager.config.php',
    'controllers' => require 'controllers.config.php',
    'view_manager' => require 'view_manager.config.php',
    'translator' => require 'translator.config.php',
    //'form_elements' => require 'form_elements.config.php',
    //'view_helpers' => require 'view_helpers.config.php',
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);
