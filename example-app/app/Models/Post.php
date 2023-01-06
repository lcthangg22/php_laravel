<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // One To Many
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Many To Many
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    // Has One Through
    public function productComment()
    {
        return $this->hasOneThrough(Product::class, Comment::class);
    }

    // Has Many Through
    public function users()
    {
        return $this->hasManyThrough(Product::class, User::class);
    }

    use HasFactory;
}
