<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->unique(); // kode unik pembayaran
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('artwork_id')->constrained('artworks')->onDelete('cascade');
            $table->string('payment_method'); // contoh: OVO, DANA, BANK_TRANSFER
            $table->integer('amount'); // total pembayaran
            $table->string('status')->default('Completed');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
