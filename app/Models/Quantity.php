<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->hasOne(Food::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
