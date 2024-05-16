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
        Schema::table('quadrinhos', function (Blueprint $table) {
            $table->unsignedBigInteger('traducao_id')->after('editora_id')->nullable();

            $table->foreign('traducao_id')->references('id')->on('traducoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quadrinhos', function (Blueprint $table) {
            $table->dropForeign('quadrinhos_traducao_id_foreign');

            $table->dropColumn('traducao_id');
        });
    }
};
