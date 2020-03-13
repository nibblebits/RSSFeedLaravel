<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'title', 'description', 'image_url', 'article_dated', 'url'
    ];


    public function categories()
    {
        return $this->belongsToMany('App\NewsCategory');
    }

    public function getImageUrl()
    {
        return $this->image_url ? $this->image_url : url('images/no-image.png');
    }
}
