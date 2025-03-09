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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 20)->unique();
            $table->string('name', 255);
            $table->enum('membership_type', ['mensual', 'trimestral', 'anual']);
            $table->decimal('membership_price', 10, 2);
            $table->boolean('has_paid')->default(false);
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 15)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
