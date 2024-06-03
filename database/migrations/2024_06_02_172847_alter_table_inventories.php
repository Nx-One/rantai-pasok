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
        Schema::table('inventories', function (Blueprint $table) {
            $table->integer('safety_stock')->after('price');
            $table->integer('deviation')->after('safety_stock');
            $table->dropColumn('minimum_stock');
            $table->dropColumn('last_sent_at');
            $table->dropColumn('last_received_at');
            $table->dropColumn('durian_received');
            $table->integer('eoq')->after('safety_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('safety_stock');
            $table->dropColumn('deviation');
            $table->integer('minimum_stock')->after('price');
            $table->timestamp('last_sent_at')->after('minimum_stock');
            $table->timestamp('last_received_at')->after('last_sent_at');
            $table->integer('durian_received')->after('last_received_at');
            $table->dropColumn('eoq');
        });
    }
};
