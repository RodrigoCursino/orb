<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecoCustoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco_custo', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor',10,2);
            $table->date('data');

            //Mercadorias
            $table->integer('mercadoria_id')->unsigned();
            $table->foreign('mercadoria_id')->references('id')
                ->on('mercadorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Fronecedores
            $table->integer('fornecedor_id')->unsigned();
            $table->foreign('fornecedor_id')->references('id')
                ->on('fornecedores')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //TODO */Falta acrescentar a chave estrangeira de nota de entrada*/

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
        Schema::dropIfExists('preco_custo');
    }
}
