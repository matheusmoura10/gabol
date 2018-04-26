<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableConfigAplicacao1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('config_aplicacao', function ($table) {
        $table->string('lat_init')->after('nome_contratante')->nullable(); 
        $table->string('lon_init')->after('lat_init')->nullable();
        $table->text('logo_pdf')->after('doc_pdf_com_sem_foto')->nullable();
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
            $table->dropColumn('lat_init');
            $table->dropColumn('lon_init');
            $table->dropColumn('logo_pdf');
        });
    }
}



