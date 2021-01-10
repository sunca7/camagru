<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/database.php';

//        echo '<pre>';
//        var_dump($callback);
//        echo '<pre>';
//        exit;

use app\core\Application;
use app\controllers\SiteControllers;
use app\controllers\AuthController;

$config = [
    'db' => [
        'dsn' => $DB_DSN,
        'user' => $DB_USER,
        'password' => $DB_PASSWORD,
    ]
];

$app = new Application(__DIR__, $config);

$app->router->get('/', [new SiteControllers(), 'home']);
$app->router->get('/contact', [new SiteControllers(), 'contact']);
$app->router->post('/contact', [new SiteControllers(), 'handleContact']);

$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);
$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);

$app->run();

