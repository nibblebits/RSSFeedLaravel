<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
        'title'
    ];


    public function news()
    {
        return $this->belongsToMany('App\News');
    }

    public function rss_feeds()
    {
        return $this->belongsToMany('App\RssFeed');
    }
}
