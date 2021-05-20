<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

ECHO __DIR__;
ECHO "<br>";
ECHO dirname(__DIR__);

$app = new Application();

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

$app->run();