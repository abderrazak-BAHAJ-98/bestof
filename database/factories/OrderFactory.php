<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=> $this->faker->numberBetween(1,20),
            'user_id'=> $this->faker->numberBetween(1,5),
            'quantity_product'=> $this->faker->numberBetween(1,17),
            'card_id'=> $this->faker->numberBetween(1,5),
            'price_sall'=> $this->faker->randomFloat(null,40,4000),
        ];
    }
}
