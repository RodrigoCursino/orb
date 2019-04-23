<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome_fantasia',350);
            $table->string('razao_social',350);
            $table->string('cnpj',19);
            $table->string('ie',14);
            $table->string('observacao',500);
            $table->boolean('forn_mercadoria');

            $table->boolean('ativo')->default(1);

            //forignKeys

            //Endereço
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id')
                  ->on('enderecos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            //Dados Bancários
            $table->integer('dados_bancarios_id')->unsigned();
            $table->foreign('dados_bancarios_id')->references('id')
                ->on('dados_bancarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Contato
            $table->integer('contato_id')->unsigned();
            $table->foreign('contato_id')->references('id')
                ->on('contatos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
