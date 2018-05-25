<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableIndicacaoAddForeIndicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicacaos', function (Blueprint $table) {
            $table->integer('id_sistema_indicacao')->unsigned()->change();
             $table->integer('id_autor_indicacao')->unsigned()->change();

            $table->foreign('id_sistema_indicacao')->references('id_aplicacao')->on('config_aplicacao');
            $table->foreign('id_autor_indicacao')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        $table->dropColumn('id_sistema_indicacao');
        $table->dropColumn('id_autor_indicacao');
    }
}
