<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes;
    public function images() { 
    	return $this->hasMany("App/Images");
    }

    public function categories()
    {
    	return $this->belongsToMany("App\Category", 'categories_products', 'product_id', 'category_id');
    }

    public function inventory()
    {
        return $this->hasOne('App\Inventory');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
