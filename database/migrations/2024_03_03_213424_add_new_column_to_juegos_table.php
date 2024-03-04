<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Agrega la nueva columna
        Schema::table('juegos', function (Blueprint $table) {
            $table->integer('num_jug')->default(2); // Cambia "nueva_columna" por el nombre de tu nueva columna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la nueva columna si necesitas deshacer la migración
        Schema::table('juegos', function (Blueprint $table) {
            $table->dropColumn('num_jug'); // Cambia "nueva_columna" por el nombre de tu nueva columna
        });
    }
}