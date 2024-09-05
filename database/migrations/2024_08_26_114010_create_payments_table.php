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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('to');
            $table->string('recipient_account')->nullable(); // Account number of the recipient
            $table->decimal('amount', 10, 2); // Adjust precision as needed
            $table->string('currency', 3); // ISO 4217 currency codes
            $table->string('payment_method');
            $table->string('transaction_id')->unique();
            $table->enum('status', ['P','B','V'] );
            $table->DateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
