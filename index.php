<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// constants
define('ROOT', dirname(__FILE__));
define('SITENAME', "http://h0stname.tk");

session_start();

require_once 'application/lib/dev.php';

use application\core\Router;

spl_autoload_register(

   function ($class) {
      $path = str_replace('\\', '/', $class . '.php');
      if (file_exists($path)) {
         require_once $path;
      }
   });

$router = new Router;
$router->run();
