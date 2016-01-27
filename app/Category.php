<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public function products() 
    {
    	return $this->belongsToMany("App\Product", 'categories_products', 'category_id', 'product_id');
    }

    public function news() 
    {
    	return $this->belongsToMany("App\News", 'categories_news', 'category_id', 'news_id');
    }
}
