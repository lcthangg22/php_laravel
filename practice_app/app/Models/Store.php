<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    protected $fillable = ['store_name', 'phone', 'email', 'street', 'city', 'state', 'zip_code'];

    public $timestamps = null;

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'stocks', 'product_id', 'store_id');
    }

    public function stocks()
    {
        return $this->belongsToMany(Product::class, 'stocks', 'product_id', 'store_id');
    }
}
