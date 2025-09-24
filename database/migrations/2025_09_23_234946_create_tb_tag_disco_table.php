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
        Schema::create('tb_tag_disco', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->foreignId('id_tag')->constrained('tb_tag')->cascadeOnDelete();
            $table->foreignId('id_disco')->constrained('tb_disco')->cascadeOnDelete();

            $table->primary(['id','id_tag','id_disco']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tag_disco');
    }
};
