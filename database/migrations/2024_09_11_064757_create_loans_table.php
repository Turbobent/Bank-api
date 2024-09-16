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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // User who took the loan
            $table->decimal('loan_amount', 15, 2); // Loan amount
            $table->decimal('interest_rate', 5, 2); // Interest rate (e.g., 5.5%)
            $table->enum('loan_type', ['p', 'm', 'a', 'e']);//'personal', 'mortgage', 'auto', 'education'
            $table->integer('term_months'); // Duration of the loan in months
            $table->decimal('monthly_payment', 15, 2); // Calculated monthly payment
            $table->date('disbursement_date');
            $table->date('due_date'); // When the loan needs to be fully paid
            $table->enum('status',['pe','a','pa'])->default('p'); //pending, approved, paid
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
