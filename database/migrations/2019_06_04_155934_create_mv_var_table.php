<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMvVarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv_var', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('mercadoria_variacao_id')->unsigned();
            $table->foreign('mercadoria_variacao_id')
                ->references('id')
                ->on('mercadoria_variacao')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('variacao_id')->unsigned();
            $table->foreign('variacao_id')
                ->references('id')
                ->on('variacao')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('mv_var');
    }
}
