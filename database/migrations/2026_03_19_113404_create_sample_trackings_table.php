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
        Schema::create('sample_trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->constrained();
            $table->string('status');
            $table->string('location');
            $table->string('handled_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_trackings');
    }
};
