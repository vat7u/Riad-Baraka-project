<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function order_type()
    {
        return $this->hasOne(Order_type::class);
    }
}
