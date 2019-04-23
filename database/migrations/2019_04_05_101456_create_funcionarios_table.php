<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {

            $table->increments('id');
            $table->decimal('salario',8,2);
            $table->string('nome',250);
            $table->string('apelido',50);
            $table->date('data_nascimento');
            $table->string('rg',13);
            $table->string('cpf',15);
            $table->enum('estado_civil',["SOLTEIRO","CASADO","DIVORCIADO","VIUVO"]);
            $table->enum('sexo',["FEMININO","MASCULINO"]);
            $table->string('login',15);
            $table->string('senha',15);
            $table->string('observacao',500);

            $table->boolean('ativo')->default(1);

            //forignKeys

            //Unidade
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')
                ->on('unidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Cargo
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')
                ->on('cargos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Departamento
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')
                ->on('departamento')
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

            //Dados Bancários
            $table->integer('dados_bancarios_id')->unsigned();
            $table->foreign('dados_bancarios_id')->references('id')
                ->on('dados_bancarios')
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
        Schema::dropIfExists('funcionarios');
    }
}
