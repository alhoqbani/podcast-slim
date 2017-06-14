<?php
require_once '../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

require_once 'database.php';


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);


require_once '../routes/api.php';