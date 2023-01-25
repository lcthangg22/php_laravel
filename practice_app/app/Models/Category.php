<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ["category_name"];

    public $timestamps = null;

    public function products() {
        return $this->hasMany(Product::class);
    }
}
