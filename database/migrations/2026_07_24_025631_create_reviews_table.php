<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->id();

            // siapa yang membeli tiket
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // transaksi yang direview
            $table->foreignId('transaction_id')
                ->constrained()
                ->cascadeOnDelete();

            // event yang direview
            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            // organizer pemilik event
            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            // rating
            $table->tinyInteger('rating');

            // komentar
            $table->text('review')->nullable();

            $table->timestamps();

            // satu transaksi hanya boleh review satu kali
            $table->unique('transaction_id');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};