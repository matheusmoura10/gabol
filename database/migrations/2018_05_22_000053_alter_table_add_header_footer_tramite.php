<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAddHeaderFooterTramite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_aplicacao', function (Blueprint $table) {
            $table->string('header')->default('0');
            $table->string('footer')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_aplicacao', function ($table) {
            $table->dropColumn('header');
            $table->dropColumn('footer');
        });
    }
}
