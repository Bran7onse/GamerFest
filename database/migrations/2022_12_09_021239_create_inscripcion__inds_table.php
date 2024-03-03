<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionIndsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion__inds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ind')->unsigned();
            $table->integer('id_jue')->unsigned();
            $table->decimal('precio_ins');
            $table->string('pago_ins',100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_ind')->references('id')->on('individuales')->onDelete('cascade');
            $table->foreign('id_jue')->references('id')->on('juegos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscripcion__inds');
    }
}
