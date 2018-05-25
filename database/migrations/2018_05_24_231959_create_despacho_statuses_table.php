<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespachoStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despacho_status', function (Blueprint $table) {
            $table->increments('id_despacho');
            $table->integer('id_dominio_despacho')->unsigned();
            $table->string('despacho');
            $table->timestamps();
            $table->foreign('id_dominio_despacho')
            ->references('id_aplicacao')->on('config_aplicacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despacho_statuses');
    }
}
