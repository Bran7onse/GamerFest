<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juegos', function (Blueprint $table) {
            $table->string('image_path')->nullable(); // Añade la columna para la ruta de la imagen
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juegos', function (Blueprint $table) {
            $table->dropColumn('image_path'); // Elimina la columna si se revierte la migración
        });
    }
}
