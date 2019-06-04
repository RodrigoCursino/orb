<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoqueUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque_unidade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estoque');
            $table->integer('estoque_min');
            $table->integer('estoque_max');

            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')
                ->references('id')
                ->on('unidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('mercadoria_variacao_id')->unsigned();
            $table->foreign('mercadoria_variacao_id')
                ->references('id')
                ->on('mercadoria_variacao')
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
        Schema::dropIfExists('estoque_unidade');
    }
}
