<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT', __DIR__ . '/../');

session_start();
require_once ROOT . '/application/config/root.php';
require_once ROOT . '/application/lib/dev.php';

spl_autoload_register(
    function ($class) {
        $path = ROOT . str_replace('\\', '/', $class . '.php');
        if (file_exists($path)) {
            require_once $path;
        }
    });

use application\core\Router;

$router = new Router;
$router->run();
