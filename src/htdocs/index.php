<?php

use Mvc160\Route\Request;
use Mvc160\Database\Database;
use Mvc160\Dispatcher\Dispatcher;

include_once '../Blog160/bootstrap.php';

// date_default_timezone_set('UTC');

$applicationBaseDir = __DIR__.'/../Blog160';

$route = new Request($_REQUEST, 'Blog160', 'Blog', 'ShowAll');

$database = new Database('root', '', 'blog160', 'localhost' );

$dispatcher = new Dispatcher($route, $database, __DIR__.'/../Blog160/');
echo $dispatcher->render();