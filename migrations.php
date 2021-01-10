<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use app\core\Application;

$config = [
    'db' => [
        'dsn' => $DB_DSN,
        'user' => $DB_USER,
        'password' => $DB_PASSWORD,
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();