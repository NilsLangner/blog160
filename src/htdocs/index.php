<?php

use Mvc160\Route\Request;
use Mvc160\Dispatcher\Dispatcher;

include_once '../Blog160/bootstrap.php';

$applicationBaseDir = __DIR__.'/../Blog160';

$route = new Request($_REQUEST, 'Blog160');

$dispatcher = new Dispatcher($route);
$dispatcher->render();