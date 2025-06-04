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
         $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
         $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
         $table->string('judul_pengaduan');
         $table->string('nama_guru');
         $table->text('deskripsi');
         $table->string('status_pengaduan')->default('belum diproses');
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
