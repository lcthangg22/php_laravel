<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table ="brands";

    protected $fillable = ['brand_name'];

    public $timestamps = null;

   public function products()
   {
       return $this->hasMany(Product::class);
   }
}
