<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'street', 'city', 'state', 'zip_code'];

    public $timestamps = null;
}
