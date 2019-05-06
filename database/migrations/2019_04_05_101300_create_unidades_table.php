<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',250);
            $table->string('razao_social',250);
            $table->string('nome_fantasia',250);
            $table->string('cnpj',20);
            $table->string('ie',20);
            $table->boolean('loja')->default(1);
            $table->string('observacao',500);

            $table->boolean('ativo')->default(1);

            //forignKeys

            //Centro Custo
            $table->integer('centro_custo_id')->unsigned();
            $table->foreign('centro_custo_id')->references('id')
                ->on('centro_custo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Endereço
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id')
                ->on('enderecos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Contato
            $table->integer('contato_id')->unsigned();
            $table->foreign('contato_id')->references('id')
                ->on('contatos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('unidade_estoque_id')->default(0);
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
        Schema::dropIfExists('unidades');
    }
}
