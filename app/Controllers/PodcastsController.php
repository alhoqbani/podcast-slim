<?php

namespace App\Controllers;

use App\Models\Podcast;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Http\Response as Response;

class PodcastsController
{
    
    public function index(Request $request, Response $response, $args)
    {
        $podcats = Podcast::all();
        
        return $response->withJson($podcats);
    }
    
    public function show(Request $request, Response $response, $args)
    {
        $podcat = Podcast::find($args['id']);
        if (!$podcat) {
            return $response->withJson([
                'error' => 'No podcast was found'
            ], 404);
        }
        return $response->withJson($podcat);
    }
}