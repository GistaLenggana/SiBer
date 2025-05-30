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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul_pengaduan');
            $table->text('deskripsi');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['belum diproses', 'sedang diproses', 'sudah diproses'])->default('belum diproses');
            $table->string('nama_guru')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
