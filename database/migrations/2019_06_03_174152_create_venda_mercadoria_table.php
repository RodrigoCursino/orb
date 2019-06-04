<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaMercadoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_mercadoria', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('venda_id')->unsigned();
            $table->foreign('venda_id')
                ->references('id')
                ->on('vendas')
                ->onDelete('cascade')
                ->onDelete('cascade');

            $table->integer('mercadoria_id')->unsigned();
            $table->foreign('mercadoria_id')
                ->references('id')
                ->on('mercadorias')
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
        Schema::dropIfExists('venda_mercadoria');
    }
}
