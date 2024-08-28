<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(25)
            ->hasTransactions(10)
            ->hasAccounts(3)
            ->create();

            Customer::factory()
            ->count(10)
            ->hasTransactions(50)
            ->hasAccounts(1)
            ->create();


            Customer::factory()
            ->count(5)
            ->hasTransactions(5)
            ->hasAccounts(5)
            ->create();

            Customer::factory()
            ->count(13)
            ->hasAccounts(1)
            ->create();
    }
}
