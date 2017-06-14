<?php
//die();
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->get('/podcasts', function (RequestInterface $request, ResponseInterface $response, $args) {
    $podcasts = \App\Models\Podcast::where('name', 'like', '%aashiqui%')->get();
    dd($podcasts);
    return '<h1>Welcome to Website</h1>';
});