<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
    use Sluggable;

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['brand_name']
            ]
        ];
    }

    protected $guarded = [];
    protected $table = 'brands';
    public $primaryKey = 'id';
    public $timestamps = true;
}
