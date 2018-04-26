<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ementas', function (Blueprint $table) {
            $table->increments('id_ementa');
            $table->integer('id_dominio_ementa')->unsigned();
            $table->string('titulo_ementa');
            $table->string('criada_por_ementa')->nullable();
            $table->string('status_ementa')->default('1');
            $table->foreign('id_dominio_ementa')
            ->references('id_aplicacao')->on('config_aplicacao');
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
        Schema::dropIfExists('ementas');
    }
}
