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
            $table->string('ncm',50)->default('');
            $table->string('unidade_medida',5);
            $table->string('unidade_caixa',5);
            $table->string('observacao',500);

            //forignKeys

            //Fornecedores
            $table->integer('fornecedor_id')->unsigned();
            $table->foreign('fornecedor_id')->references('id')
                ->on('fornecedores')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Grupo
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')
                ->on('grupos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Grupo
            $table->integer('sub_grupo_id')->unsigned();
            $table->foreign('sub_grupo_id')->references('id')
                ->on('sub_grupos')
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
        Schema::dropIfExists('mercadorias');
    }
}
