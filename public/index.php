<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteControllers;

//        echo '<pre>';
//        var_dump($callback);
//        echo '<pre>';
//        exit;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [new SiteControllers(), 'handleContact']);

$app->run();

