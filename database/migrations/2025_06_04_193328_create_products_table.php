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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('codigo_peca', 30);
            $table->integer('quantidade');
            $table->integer('preco');
            $table->integer('lote');
            $table->string('fornecedor', 20);
            $table->string('categoria', 100)->nullable();
            $table->text('descricao')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
