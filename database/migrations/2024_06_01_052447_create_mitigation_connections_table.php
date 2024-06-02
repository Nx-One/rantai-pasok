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
        Schema::create('mitigation_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitigation_header_id')->constrained();
            $table->foreignId('target_mitigation_header_id')->constrained('mitigation_headers')->cascadeOnDelete();
            $table->integer('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitigation_connections');
    }
};
