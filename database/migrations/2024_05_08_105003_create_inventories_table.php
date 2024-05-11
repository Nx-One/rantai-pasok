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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('durian_quantity');
            $table->integer('durian_received');
            $table->integer('minimum_stock');
            $table->dateTime('last_sent_at');
            $table->dateTime('last_received_at');
            $table->integer('store_cost');
            $table->integer('order_cost');
            $table->integer('demand');
            $table->integer('price');
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('inventories_user_id_foreign');
        $table->dropIndex('inventories_user_id_index');
        $table->dropColumn('user_id');
        Schema::dropIfExists('inventories');
    }
};
