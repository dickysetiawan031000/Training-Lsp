<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => mt_rand(1, 5),
            'customer_id' => mt_rand(1, 5),
            'qty' => mt_rand(5, 10),
            'price' => $this->faker->numberBetween(15000, 60000),
            'total' => $this->faker->numberBetween(100000, 200000)
        ];
    }
}
