<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','description', 'image_url', 'article_dated', 'url'
    ];
    
    
}
