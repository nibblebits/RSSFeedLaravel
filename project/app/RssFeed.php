<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    protected $fillable = [
        'name','description', 'image_url', 'url', 'processing_state'
    ];

    public function getImageUrl()
    {
        return $this->image_url ? $this->image_url : url('images/no-image.png');
    }
}
