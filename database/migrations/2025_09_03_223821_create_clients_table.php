<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('cep', 9);
            $table->string('endereco');
            $table->string('numero', 10);
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf', 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
