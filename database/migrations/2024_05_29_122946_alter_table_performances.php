<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('performances');
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->integer('min_orders_shipped');
            $table->integer('max_orders_shipped');
            $table->integer('act_orders_shipped');
            $table->integer('min_requests_fulfilled');
            $table->integer('max_requests_fulfilled');
            $table->integer('act_requests_fulfilled');
            $table->integer('min_number_of_shipments');
            $table->integer('max_number_of_shipments');
            $table->integer('act_number_of_shipments');
            $table->integer('min_lead_time');
            $table->integer('max_lead_time');
            $table->integer('act_lead_time');
            $table->integer('min_order_cycles');
            $table->integer('max_order_cycles');
            $table->integer('act_order_cycles');
            $table->integer('min_flexibility');
            $table->integer('max_flexibility');
            $table->integer('act_flexibility');
            $table->integer('min_supply_chain_costs');
            $table->integer('max_supply_chain_costs');
            $table->integer('act_supply_chain_costs');
            $table->integer('min_cogs');
            $table->integer('max_cogs');
            $table->integer('act_cogs');
            $table->integer('min_payback_cycle');
            $table->integer('max_payback_cycle');
            $table->integer('act_payback_cycle');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->integer('orders_shipped');
            $table->integer('target_orders_shipped');
            $table->integer('requests_fulfilled');
            $table->integer('target_requests_fulfilled');
            $table->integer('number_of_shipments');
            $table->integer('target_number_of_shipments');
            $table->integer('lead_time');
            $table->integer('target_lead_time');
            $table->integer('order_cycles');
            $table->integer('target_order_cycles');
            $table->integer('flexibility');
            $table->integer('target_flexibility');
            $table->integer('supply_chain_costs');
            $table->integer('target_supply_chain_costs');
            $table->integer('cogs');
            $table->integer('target_cogs');
            $table->integer('payback_cycle');
            $table->integer('target_payback_cycle');
            $table->string('status');
            $table->string('total');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
