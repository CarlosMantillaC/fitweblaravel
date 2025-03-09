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
        Schema::create('checkins', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['client', 'employee']);
            $table->unsignedBigInteger('user_id');
            $table->timestamp('checkin_time');
            $table->timestamp('checkout_time')->nullable();
            $table->timestamps();

            // Índices para mejorar las consultas
            $table->index(['user_type', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};
