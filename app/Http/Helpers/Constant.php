<?php
namespace App\Http\Helpers;

class Constant{

    public const WEIGHT_PERF_VAL = [
        'orders_shipped' => 0.02072, // Jumlah pesanan yang dikirim tepat waktu
        'requests_fulfilled' => 0.0546, // Jumlah permintaan yang dipenuhi dengan waktu dan jumlah yang sesuai
        'number_of_shipments' => 0.06344, // Jumlah pengiriman yang sesuai standar
        'lead_time' => 0.0509, // Lead time
        'order_cycles' => 0.10588, // Siklus pemenuhan pesanan
        'payback_cycle' => 0.24128, // Siklus balik modal
        'flexibility' => 0.17713, // Fleksibilitas
        'supply_chain_costs' => 0.07152, // Biaya total rantai pasok
        'cogs' => 0.21455 // Harga pokok penjualan (HPP)
    ];
}