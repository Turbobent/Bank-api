<?php

namespace Database\Factories;
use App\Models\Customer;
use App\Models\Account;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['V','P','B']); //Void, sucess, failed

        return [
            'customer_id' => Customer::factory(),
            'to' => Account::factory(),
            'recipient_account' => $this->faker->bankAccountNumber(),
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'currency' => $this->faker->currencyCode(), // Random ISO 4217 currency code
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'transaction_id' => $this->faker->numberBetween(1, 1000000000),
            'status' => $status,
            'paid_at' => $status == 'P' ? $this->faker->dateTimeThisDecade() : null, // Random date and time or null
        ];
    }
}
