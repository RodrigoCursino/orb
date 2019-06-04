<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaPagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pagamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 10)->unique();
            $table->string('nome_tipo',30);
            $table->integer('dias_credito');
            $table->string('observacao',500);
            $table->integer('id_pai')->default(0);
            $table->string('cod_forma',10);
            $table->string('nome_forma',30);
            $table->string('nome_ecf',30);
            $table->float('porc_entrada');
            $table->decimal('taxa_desconto',2,2);
            $table->integer('quant_parcela');
            $table->integer('intevalo');
            $table->enum('dia_mes',['Dia(s)','Mês(es)']);
            $table->boolean('cheque')->default(0);
            $table->boolean('crediario')->default(0);
            $table->boolean('troca')->default(0);
            $table->boolean('desconto')->default(0);

            //Conta contabil
            $table->integer('conta_contabil_id')->unsigned();
            $table->foreign('conta_contabil_id')->references('id')
                ->on('conta_contabil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Resumo caixa
            $table->integer('resumo_caixa_id')->unsigned();
            $table->foreign('resumo_caixa_id')->references('id')
                ->on('resumo_caixa')
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
        Schema::dropIfExists('forma_pagamento');
    }
}
