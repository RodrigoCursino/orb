<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_bancarios', function (Blueprint $table) {

            $table->increments('id');
            $table->string('agencia',20);
            $table->string('conta',20);
            $table->enum('tipo',['CORRENTE','POUPANÇA'])->default('CORRENTE');

            //Banco
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')
                ->on('bancos')
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
        Schema::dropIfExists('dados_bancarios');
    }
}
