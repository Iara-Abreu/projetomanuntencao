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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->unsignedBigInteger('id_perfil');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('id_perfil')->references('id_perfil')
                ->on('perfis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
