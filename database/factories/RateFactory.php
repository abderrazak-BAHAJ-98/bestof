<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
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
            'rate_Point'=> $this->faker->numberBetween(1,5),
        ];
    }
}
