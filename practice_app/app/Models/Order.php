<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id', 'order_status', 'order_date', 'required_date', 'shipped_date', 'store_id', 'staff_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
