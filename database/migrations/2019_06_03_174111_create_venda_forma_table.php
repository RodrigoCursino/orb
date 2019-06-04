<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaFormaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_forma', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 10);
            $table->string('nome_tipo', 30);
            $table->float('taxa_desconto');
            $table->integer('dias_credito');
            $table->string('observacao', 30);
            $table->integer('pai_id');
            $table->integer('cod_forma');
            $table->string('nome_ecf', 30);
            $table->float('taxa_desc');
            $table->float('porc_entrada');
            $table->integer('quant_parcela');
            $table->integer('intervalo');
            $table->enum('dia_mes', ['Dia(s)','Mês(es)']);
            $table->boolean('cheque');
            $table->boolean('crediario');
            $table->boolean('troca');
            $table->boolean('desconto');

            $table->integer('contacontabil_id')->unsigned();
            $table->foreign('contacontabil_id')
                ->references('id')
                ->on('conta_contabeis')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('resumocaixa_id')->unsigned();
            $table->foreign('resumocaixa_id')
                ->references('id')
                ->on('resumo_caixa')
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
        Schema::dropIfExists('venda_forma');
    }
}
