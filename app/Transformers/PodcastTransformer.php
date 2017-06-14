<?php

namespace App\Transformers;

use App\Models\Podcast;
use League\Fractal\TransformerAbstract;

class PodcastTransformer extends TransformerAbstract
{
    
    public function transform(Podcast $podcast)
    {
        return [
            'id'          => $podcast->id,
            'name'        => $podcast->name,
            'description' => $podcast->description,
            'files'         => $podcast->files,
            'created_at'  => $podcast->created_at->toTimeString(),
            'created_at_human'  => $podcast->created_at->diffForHumans(),
        ];
    }
    
}