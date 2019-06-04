<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 30);
            $table->enum('natureza_juridica', ['Física','Jurídica']);
            $table->string('nome_fantasia', 30);
            $table->date('data_nascimento');
            $table->enum('classificacao',['Varejo','Atacado','Revenda']);
            $table->string('observacao', 60);
            $table->boolean('ativo');

            $table->integer('contato_id')->unsigned();
            $table->foreign('contato_id')
                ->references('id')
                ->on('contatos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')
                ->references('id')
                ->on('enderecos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')
                ->references('id')
                ->on('unidades')
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
        Schema::dropIfExists('clientes');
    }
}
