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
        Schema::create('quadrinhos', function (Blueprint $table) {
            $table->id();
            $table->integer('ano');
            $table->string('nome');
            $table->string('autor');
            $table->unsignedBigInteger('editora_id');
            $table->timestamps();

            $table->foreign('editora_id')->references('id')->on('editoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quadrinhos');
    }
};
