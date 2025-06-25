<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cuisine;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'slug',
        'product_description',
        'price',
        'cuisines_id',
        'ingredients',
        'pre_order',
        'always_avaialable',
        'start_date',
        'end_date',
    ];

    public function Cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }


}
