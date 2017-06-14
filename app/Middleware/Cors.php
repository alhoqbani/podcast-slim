<?php

namespace App\Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

class Cors
{
    
    public function __invoke(Request $request, Response $response, App $next)
    {
        $response = $next($request, $response);
        $response = $response->withHeader('Access-Control-Allow-Origin', getenv('CLIENT_URL'))
            ->withHeader('Access-Control-Allow-Methods', 'GET, OPTIONS');
        
        return $response;
    }
}