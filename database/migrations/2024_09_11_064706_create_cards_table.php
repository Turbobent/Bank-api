<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // User who owns the card
            $table->string('card_number')->unique();
            $table->enum('card_type', ['debit', 'credit']);
            $table->string('cvv');
            $table->date('expiration_date');
            $table->string('status')->default('active'); // E.g., active, blocked, expired
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // Linked to the account
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
