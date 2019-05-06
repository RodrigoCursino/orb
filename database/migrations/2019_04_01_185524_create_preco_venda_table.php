<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecoVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco_venda', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor',10,2);
            $table->date('data');

            $table->boolean('ativo')->default(1);

            //Mercadorias
            $table->integer('mercadoria_id')->unsigned();
            $table->foreign('mercadoria_id')->references('id')
                ->on('mercadorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Tabela de Preço
            $table->integer('tabela_preco_id')->unsigned();
            $table->foreign('tabela_preco_id')->references('id')
                ->on('tabela_preco')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('preco_venda');
    }
}
