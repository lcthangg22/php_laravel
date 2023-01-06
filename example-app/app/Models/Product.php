<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // One To One
    public function price()
    {
        return $this->hasOne(Price::class);
        // $price = Product::find(1)->price;
    }

    // Many To Many
    public function post()
    {
        $name = 'abc';
        echo "$name";
        return $this->belongsToMany(Post::class);
    }

    use HasFactory;
}
