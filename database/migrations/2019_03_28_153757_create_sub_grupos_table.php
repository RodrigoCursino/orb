<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',30);

            $table->boolean('ativo')->default(1);

            //Grupos
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')
                ->on('grupos')
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
        Schema::dropIfExists('sub_grupos');
    }
}
