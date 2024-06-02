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
        Schema::create('mitigation_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitigation_header_id')->constrained()->onDelete('cascade');
            $table->foreignId('master_category_risk_id')->constrained()->onDelete('cascade');
            $table->integer('value');
            $table->float('sum');
            $table->float('cumulative');
            $table->integer('rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitigation_results');
    }
};
