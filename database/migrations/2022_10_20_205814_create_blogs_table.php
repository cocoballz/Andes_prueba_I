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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario')->nullable(0)->comment('referencia a usuario que crea el blog');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('titulo')->nullable(0)->comment('titulo entrada');
            $table->string('descripcion',2300)->nullable(0)->comment('cuerpo entrada');
            $table->string('entrada_img')->nullable(0)->comment('imagen entrada');
            $table->integer('estado')->default(1)->comment('estado entrada');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
