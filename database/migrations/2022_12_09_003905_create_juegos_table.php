<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aul')->unsigned();
            $table->integer('id_cat')->unsigned();
            $table->string('nombre_jue')->nullable();
            $table->string('imagen',100);
            $table->decimal('precio_jue')->nullable();
            $table->string('descripcion_jue')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_aul')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('id_cat')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('juegos');
    }
}
