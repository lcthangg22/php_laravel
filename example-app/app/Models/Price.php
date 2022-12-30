<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // One To One
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
