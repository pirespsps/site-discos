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
        Schema::create('tb_comentario_banda', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->foreignId('id_comentario')->constrained('tb_comentario')->cascadeOnDelete();
            $table->foreignId('id_banda')->constrained('tb_banda')->cascadeOnDelete();
            $table->primary(['id','id_comentario','id_banda']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_comentario_banda');
    }
};
