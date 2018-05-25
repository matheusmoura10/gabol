<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableIndicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('indicacaos', function ($table) {
        $table->string('numero_protocolo_indicacao')->after('id_autor_indicacao')->nullable(); 
        $table->string('texto_indicacao')->after('numero_protocolo_indicacao'); 
        $table->string('associado_indicacao')->after('texto_indicacao')->nullable(); ; 
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
            $table->dropColumn('numero_protocolo_indicacao');
            $table->dropColumn('texto_indicacao');
            $table->dropColumn('associado_indicacao');
        });
    }
}
