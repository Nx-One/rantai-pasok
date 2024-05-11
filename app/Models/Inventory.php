<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'durian_quantity',
        'durian_received',
        'minimum_stock',
        'last_sent_at',
        'last_received_at',
        'store_cost',
        'order_cost',
        'demand',
        'price',
    ];

    protected $casts = [
        'last_sent_at' => 'datetime',
        'last_received_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
