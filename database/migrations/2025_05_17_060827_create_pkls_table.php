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
        Schema::create('pkls', function (Blueprint $table) {
            $table->id();
            $table->date('mulai');
            $table->date('selesai');
            $table->timestamps();

            $table->foreignId('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreignId('guru_id')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreignId('industri_id')->references('id')->on('industris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkls');
    }
};
