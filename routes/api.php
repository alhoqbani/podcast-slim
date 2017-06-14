<?php
//die();
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->get('/', function (RequestInterface $request, ResponseInterface $response, $args) {
    return '<h1>Welcome to Website</h1>';
});