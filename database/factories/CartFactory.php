<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Factory to Data of Cart
        return [
            'product_id'=> $this->faker->numberBetween(1,20),
            'user_id'=> $this->faker->numberBetween(1,5),
            'quantity'=> $this->faker->numberBetween(1,20),
        ];
    }
}
