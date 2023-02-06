<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staffs";

    protected $fillable = ["first_name", "last_name", "email", "phone", "active", "store_id", "manager_id"];

    public $timestamps = null;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
