<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(dirname(__DIR__)));

date_default_timezone_set('America/New_York');

error_reporting(E_STRICT | E_ALL);

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

require './src/init_autoloader.php';

try {
    Zend\Mvc\Application::init(require './src/config/application.config.php')->run();
} catch(Exception $e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}
