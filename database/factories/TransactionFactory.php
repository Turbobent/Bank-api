<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Account;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['V','S','F']); //Void, sucess, failed

        return [
            'customer_id' => Customer::factory(), // Assumes there's a Customer factory
            'amount' => $this->faker->numberBetween(1, 1000000000), // Generates random amount
            'status' => $status,
            'created_at' => $this->faker->dateTimeThisDecade(), // Sets the created_at to the current timestamp
            'to' => Account::factory(),
        ];
    }
}
