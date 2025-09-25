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
        Schema::create('tb_comentario_track', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->foreignId('id_comentario')->constrained('tb_comentario')->cascadeOnDelete();
            $table->foreignId('id_track')->constrained('tb_track')->cascadeOnDelete();
            $table->primary(['id','id_comentario','id_track']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_comentario_track');
    }
};
