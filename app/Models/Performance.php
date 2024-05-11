<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_shipped',
        'target_orders_shipped',
        'requests_fulfilled',
        'target_requests_fulfilled',
        'number_of_shipments',
        'target_number_of_shipments',
        'lead_time',
        'target_lead_time',
        'order_cycles',
        'target_order_cycles',
        'flexibility',
        'target_flexibility',
        'supply_chain_costs',
        'target_supply_chain_costs',
        'cogs',
        'target_cogs',
        'payback_cycle',
        'target_payback_cycle',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
