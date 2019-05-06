<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercadoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadorias', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome',250);
            $table->string('observacao',500);

            $table->boolean('ativo')->default(1);

            //ForeignKeys

            //Unidade Caixa
            $table->integer('unidade_caixa_id')->nullable()->unsigned();
            $table->foreign('unidade_caixa_id')->references('id')
                ->on('unidade_caixa')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Unidade Medida
            $table->integer('unidade_medida_id')->nullable()->unsigned();
            $table->foreign('unidade_medida_id')->references('id')
                ->on('unidade_medida')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Fornecedores
            $table->integer('fornecedor_id')->nullable()->unsigned();
            $table->foreign('fornecedor_id')->references('id')
                ->on('fornecedores')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //NCM
            $table->integer('ncm_id')->nullable()->unsigned();
            $table->foreign('ncm_id')->references('id')
                ->on('ncm')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Marca
            $table->integer('marca_id')->nullable()->unsigned();
            $table->foreign('marca_id')->references('id')
                ->on('marca')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Linha
            $table->integer('linha_id')->nullable()->unsigned();
            $table->foreign('linha_id')->references('id')
                ->on('linha')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Coleção
            $table->integer('colecao_id')->nullable()->unsigned();
            $table->foreign('colecao_id')->references('id')
                ->on('colecao')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Categoria
            $table->integer('categoria_id')->nullable()->unsigned();
            $table->foreign('categoria_id')->references('id')
                ->on('categoria')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //Grupo
            $table->integer('grupo_id')->nullable()->unsigned();
            $table->foreign('grupo_id')->references('id')
                ->on('grupos')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //SUB Grupo
            $table->integer('sub_grupo_id')->nullable()->unsigned();
            $table->foreign('sub_grupo_id')->references('id')
                ->on('sub_grupos')
                ->onDelete('set null')
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
        Schema::dropIfExists('mercadorias');
    }
}
