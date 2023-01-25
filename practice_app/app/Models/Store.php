<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    protected $fillable = ['store_name', 'phone', 'email', 'street', 'city', 'state', 'zip_code'];

    public $timestamps = null;


}
