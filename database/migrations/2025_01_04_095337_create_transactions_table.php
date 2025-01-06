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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('program');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nama');
            $table->date('tgl_faktur');
            $table->integer('jumlah_donasi');
            $table->string('payment_type');
            $table->string('transaction_id')->uniq();
            $table->string('va_number');
            $table->string('transaction_status');
            $table->dateTime('transaction_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
