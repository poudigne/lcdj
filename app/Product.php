<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    public function images() { 
    	return $this->hasMany("App/Images");
    }

    /**
     * 
     */
    public function categories()
    {
    	return $this->belongsToMany("App\Category", 'categories_products', 'product_id', 'category_id');
    }
}
