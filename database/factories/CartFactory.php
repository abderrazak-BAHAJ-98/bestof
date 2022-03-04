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
        $min= 100;$max=999;
        $numberStatic = '334455';
        return [
            'user_id'=> $this->faker->numberBetween(1,5),
            'cart_sold'=> $this->faker->randomFloat(null,40,4000),
            'cart_date_expr'=> $this->faker->dateTimeBetween('now','+4 years'),
            'cart_number'=> $this->faker->numberBetween($min,$max).$numberStatic.$this->faker->numberBetween($min,$max),
        ];
    }
}
