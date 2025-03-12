<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Columna de ID autoincremental
            $table->string('email')->unique(); // Columna de correo único
            $table->string('password'); // Columna de contraseña
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins'); // Elimina la tabla si existe
    }
}