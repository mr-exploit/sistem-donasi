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
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_program');
            $table->string('nama');
            $table->string('img_program');
            $table->text('deskripsi');
            $table->integer('target_donasi');
            $table->integer('donasi_terkumpul');
            $table->enum('kecamatan', ['bengkong', 'batu aji', 'nongsa', 'batam kota', 'bulang', 'galang', 'batu ampar', 'lubuk baja', 'sagulung', 'sei beduk', 'sekupang', 'belakang padang'])->default('batam kota');
            $table->boolean('isDone');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
