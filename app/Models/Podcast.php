<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    
    public function getFilesAttribute()
    {
        return collect([
            'mp3' => $this->podcast_mp3,
            'ogg' => $this->podcast_ogg,
        ]);
    }
}