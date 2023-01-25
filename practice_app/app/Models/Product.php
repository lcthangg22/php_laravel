<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = ['products'];
    protected $fillable = ['product_name', 'brand_id', 'category_id', 'model_year', 'price'];

    public $timestamps = null;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }


}
