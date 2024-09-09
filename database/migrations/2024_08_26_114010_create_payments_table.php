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
            $table->string('recipient_account');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3);
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
