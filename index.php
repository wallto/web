<?php
/*
Интеллектуальный продукт Eagle-Software
Все права защищены
*/
require 'application/lib/Dev.php';
require "vendor/autoload.php";

use application\core\Router;
use application\lib\Database;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});


session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$dt = new Database();

$router = new Router;
$router->run();
