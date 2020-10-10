<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product_info';

    public $fillable = ['product_name', 'product_category', 'product_price', 'product_description'];


    public function images()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'id');
    }

}
