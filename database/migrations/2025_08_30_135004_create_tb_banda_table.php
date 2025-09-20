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
        Schema::create('tb_banda', function (Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->string('local',100);
            $table->integer('ano');
            $table->string('path_img',200);
            $table->foreignId('id_criador')->nullable(true)->constrained('tb_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_banda');
    }
};
