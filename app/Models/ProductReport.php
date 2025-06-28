<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Reason;

class ProductReport extends Model
{
    protected $fillable = [
        'product_id',
        'reason_id',
    ];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }
    
    
}
