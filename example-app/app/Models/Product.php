<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    // One To One
    public function price()
    {
        return $this->hasOne(Price::class,'id');
    }

    // Many To Many
    public function post()
    {
        return $this->belongsToMany(Post::class,'products_posts');
    }

    use HasFactory;
}
