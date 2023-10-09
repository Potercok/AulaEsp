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
        Schema::create('specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('asignatura');
            $table->integer('trimmestre');
            $table->integer('hora');
            $table->integer('grado');
            $table->string('seccion');
            $table->string('aprendizaje');
            $table->string('consideraciones') ->nullable();
            $table->string('articula');
            $table->string('estrategias');
            $table->string('descripcion');
            $table->string('observaciones') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
