<?php

namespace Database\Seeders;

use App\Models\Buy;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Customer::factory(5)->create();
        Product::factory(5)->create();
        Buy::factory(5)->create();
    }
}
