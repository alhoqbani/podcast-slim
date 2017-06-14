<?php

namespace App\Controllers;

use App\Models\Podcast;
use App\Transformers\PodcastTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Http\Response as Response;

class PodcastsController extends Controller
{
    
    public function index(Request $request, Response $response, $args)
    {
        /** @var \Illuminate\Pagination\Paginator $podcasts */
        $podcasts = Podcast::latest()->paginate(2);
        $podcasts->appends(array_diff_key($_GET, array_flip(['page'])));
        $resource = new Collection($podcasts->getCollection(), new PodcastTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($podcasts));
        
        $data = $this->c->fractal->createData($resource)->toArray();
        
        return $response->withJson($data);
    }
    
    public function show(Request $request, Response $response, $args)
    {
        $podcast = Podcast::find($args['id']);
        if ( ! $podcast) {
            return $response->withJson([
                'error' => 'No podcast was found',
            ], 404);
        }
        
        $resource = new Item($podcast, new PodcastTransformer());
        $data = $this->c->fractal->createData($resource)->toArray();
        
        return $response->withJson($data);
    }
}