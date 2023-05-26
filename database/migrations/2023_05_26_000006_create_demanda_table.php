<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demanda', function (Blueprint $table) {
            $table->bigIncrements( 'id_demanda');
            $table->string('ds_demanda');
            $table->text('url_imagem');
            $table->string('coordenada');
            $table->unsignedBigInteger('id_tipo_demanda');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_bairro');
            $table->unsignedBigInteger('id_situacao');
            $table->timestamps();

            $table->foreign('id_tipo_demanda')->references('id_tipo_demanda')
                ->on('tipo_demanda');
            $table->foreign('id_usuario')->references('id_usuario')
                ->on('usuario');
            $table->foreign('id_bairro')->references('id_bairro')
                ->on('bairro');
            $table->foreign('id_situacao')->references('id_situacao')
                ->on('situacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demanda');
    }
};