<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class News extends Model
{
    /**
     * 
     */
    public function categories()
    {
        return $this->belongsToMany("App\Category", 'categories_news', 'news_id', 'category_id');
    }
}
