<?php

namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'account_name' => $this->faker->words(2, true),
            'amount_of_money' => $this->faker->numberBetween(1000, 10000000),
            'account_number' => $this->faker->unique()->numberBetween(1, 1000000)
        ];
    }
}
