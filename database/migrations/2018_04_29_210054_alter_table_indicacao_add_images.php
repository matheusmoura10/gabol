<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableIndicacaoAddImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicacaos', function ($table) {
            $table->text('img_indicacao')->after('longitude_indicacao')->nullable();
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
        $table->dropColumn('img_indicacao');
    });
 }
}
