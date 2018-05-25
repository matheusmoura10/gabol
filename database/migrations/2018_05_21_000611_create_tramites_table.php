<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->increments('id_tramite');
            $table->integer('id_indicacao_tramite')->unsigned();
            $table->integer('id_sistema_tramite')->unsigned();
            $table->text('numero_protocolo_tramite')->nullable();
            $table->string('autor_tramite')->nullable();
            $table->text('texto_tramite')->nullable();
            $table->string('status_tramite')->nullable();
            $table->string('deletado_tramite')->default('0');
            $table->timestamps();
            $table->foreign('id_sistema_tramite')
            ->references('id_aplicacao')->on('config_aplicacao');
            $table->foreign('id_indicacao_tramite')
            ->references('id_indicacao')->on('indicacaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}
