<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_preco', function (Blueprint $table) {

            $table->increments('id');
            $table->string('descricao', 500);
            $table->string('observacao', 500);
            $table->decimal('desconto_maximo', 8,2);
            $table->dateTime('validade');

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
        Schema::dropIfExists('tabela_preco');
    }
}
