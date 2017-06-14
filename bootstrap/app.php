<?php
require_once '../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

require_once 'database.php';
require_once 'paginatoin.php';


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ],
]);

$container = $app->getContainer();
$container['fractal'] = function ($c) {
    return new \League\Fractal\Manager();
};

$app->add(new \App\Middleware\Cors());
require_once '../routes/api.php';