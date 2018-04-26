<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigAplicacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_aplicacao', function (Blueprint $table) {
            $table->increments('id_aplicacao');
            $table->text('titulo_site')->nullable();
            $table->text('titulo_site_interno')->nullable();
            $table->text('logo')->nullable();
            $table->text('nome_vereador_completo')->nullable();
            $table->text('nome_vereador_assinatura')->nullable();
            $table->text('foto_assinatura')->nullable();
            $table->text('doc_pdf_com_foto')->nullable();
            $table->text('doc_pdf_com_sem_foto')->nullable();
            $table->string('email')->nullable();
            $table->text('limite_email')->nullable();
            $table->text('limite_email_adicional')->nullable();
            $table->string('sms')->nullable();
            $table->text('limite_sms')->nullable();
            $table->text('limite_sms_adicional')->nullable();
            $table->string('integracao_usuario_externo')->nullable();
            $table->text('notificacao_push')->nullable();
            $table->text('foto_1_background')->nullable();
            $table->text('foto_2_background')->nullable();
            $table->text('foto_3_background')->nullable();
            $table->string('nome_contratante')->nullable();
            $table->string('ddd_telefone')->nullable();
            $table->string('telefone')->nullable();
            $table->string('ddd_celular')->nullable();
            $table->string('celular')->nullable();
            $table->string('cpf')->nullable();
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
        Schema::dropIfExists('config_aplicacaos');
    }
}
