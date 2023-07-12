<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    public $table = 'foods';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'thumbnail'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('amount', 'like', '%' . request('search') . '%');
        }
    }

    public function quantity()
    {
        return $this->belongsToMany(Quantity::class);
    }
}
