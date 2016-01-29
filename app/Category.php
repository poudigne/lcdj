<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function products() 
    {
    	return $this->belongsToMany("App\Product", 'category_product', 'category_id', 'product_id');
    }

    public function news() 
    {
    	return $this->belongsToMany("App\News", 'category_news', 'category_id', 'news_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
