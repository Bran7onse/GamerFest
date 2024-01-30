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
        Schema::create('validargrupales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inscripcion__equs')->unsigned();
            $table->boolean('validarpago')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_inscripcion__equs')->references('id')->on('inscripcion__equs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validargrupales');
    }
};
