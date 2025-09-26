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
        Schema::create('tb_user_banda', function (Blueprint $table) {
            $table->foreignId('id_user')->constrained('tb_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_banda')->constrained('tb_banda')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('isLiked')->default(false);
            $table->boolean('hasCommentary')->default(false);
            $table->primary(['id_user','id_banda']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user_banda');
    }
};
