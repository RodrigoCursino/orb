<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercadoriaVariacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadoria_variacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_ean', 50);
            $table->string('imagem');
            $table->string('descricao', 250);
            $table->boolean('ativo');

            $table->integer('mercadoria_id')->unsigned();
            $table->foreign('mercadoria_id')
                ->references('id')
                ->on('mercadorias')
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
        Schema::dropIfExists('mercadoria_variacao');
    }
}
