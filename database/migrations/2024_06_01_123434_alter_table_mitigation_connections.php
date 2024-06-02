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
        Schema::table('mitigation_connections', function (Blueprint $table) {
            $table->foreignId('mitigation_record_id')->constrained()->onDelete('cascade');
        });

        Schema::table('mitigation_results', function (Blueprint $table) {
            $table->foreignId('mitigation_record_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitigation_connections', function (Blueprint $table) {
            $table->dropForeign(['mitigation_record_id']);
            $table->dropForeign(['master_category_risk_id']);
        });

        Schema::table('mitigation_results', function (Blueprint $table) {
            $table->dropForeign(['mitigation_record_id']);
        });
    }
};
