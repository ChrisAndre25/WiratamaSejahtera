<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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
                'source' => ['category_name']
            ]
        ];

    }

    protected $guarded = [];
    protected $table = 'categories';
    public $primaryKey = 'id';
    public $timestamps = true;

}
