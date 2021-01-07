<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteControllers;
use app\controllers\AuthController;

//        echo '<pre>';
//        var_dump($callback);
//        echo '<pre>';
//        exit;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [new SiteControllers(), 'home']);
$app->router->get('/contact', [new SiteControllers(), 'contact']);
$app->router->post('/contact', [new SiteControllers(), 'handleContact']);

$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);
$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);

$app->run();

