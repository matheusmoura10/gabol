<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicacaos', function (Blueprint $table) {
            $table->increments('id_indicacao');
            $table->integer('id_sistema_indicacao')->unsigned();
            $table->integer('id_autor_indicacao')->unsigned();
            $table->integer('ementa_indicacao')->unsigned();
            $table->string('endereco_indicacao')->nullable();
            $table->string('numero_indicacao')->nullable();
            $table->string('numero_alternativo_indicacao');
            $table->string('cruzamento_indicacao')->nullable();
            $table->string('bairro_indicacao')->nullable();
            $table->string('cidade_indicacao')->nullable();
            $table->string('latitude_indicacao')->nullable();
            $table->string('longitude_indicacao')->nullable();
            $table->foreign('ementa_indicacao')
            ->references('id_ementa')->on('ementas');
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
        Schema::dropIfExists('indicacaos');
    }
}
