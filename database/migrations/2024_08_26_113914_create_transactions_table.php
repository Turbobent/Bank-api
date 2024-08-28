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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id'); // Assuming this is a foreign key
            $table->decimal('amount', 15, 2); // Storing amount as a decimal with precision
            $table->enum('status', ['V', 'S', 'F']); // void sucess  failed
            $table->unsignedBigInteger('to'); // Assuming these are foreign keys to accounts

            $table->timestamps(); // Includes 'created_at' and 'updated_at' columns
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
