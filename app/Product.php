<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['product_name', 'brand_name']
            ]
        ];
    }

    protected $guarded = [];
    protected $table = 'products';
    public $primaryKey = 'id';
    public $timestamps = true;
    

    public function category(){
       return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}

