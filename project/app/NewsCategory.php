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
}
