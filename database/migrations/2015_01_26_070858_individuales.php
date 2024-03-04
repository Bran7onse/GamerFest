<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_ind')->nullable();
            $table->string('cedula_ind')->nullable();
            $table->string('telefono_ind')->nullable();
            $table->string('correo_ind')->nullable();
            $table->string('descripcion_ind')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuales');
    }
};
