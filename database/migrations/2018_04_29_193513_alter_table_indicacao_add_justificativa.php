<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableIndicacaoAddJustificativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicacaos', function ($table) {
        $table->text('justificativa_indicacao')->after('ementa_indicacao')->nullable(); 
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicacaos', function ($table) {
            $table->dropColumn('justificativa_indicacao');
        });
    }
}
