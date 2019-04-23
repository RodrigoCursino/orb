<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabricantes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome',350);
            $table->string('nome_fantasia',350);
            $table->string('razao_social',350);
            $table->string('cnpj',19);
            $table->string('ie',14);
            $table->string('observacao',500);
            $table->enum('natureza_juridica',['FISÌCA','JURÍDICA']);

            $table->boolean('ativo')->default(1);

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
        Schema::dropIfExists('fabricantes');
    }
}
