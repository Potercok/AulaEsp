<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('specialties', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Añade la columna user_id después de id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Establece la relación de clave externa
        });
    }
    
    public function down()
    {
        Schema::table('specialties', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Elimina la relación de clave externa
            $table->dropColumn('user_id'); // Elimina la columna user_id
        });
    }
    
};
