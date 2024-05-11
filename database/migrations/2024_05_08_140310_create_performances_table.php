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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
