<?php
/**
 * Entry point for our MVC solution
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/../rcs/funcs.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
include_once(ROOT . '/components/Router.php');

$router = new Router();

$router->run();