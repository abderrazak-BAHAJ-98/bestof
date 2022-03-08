<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         //Factory to Data of Card
         $min= 100;$max=999;
         $numberStatic = '334455';
         return [
             'user_id'=> $this->faker->numberBetween(1,5),
             'card_sold'=> $this->faker->randomFloat(null,40,4000),
             'card_date_expr'=> $this->faker->dateTimeBetween('now','+4 years'),
             'card_number'=> $this->faker->numberBetween($min,$max).$numberStatic.$this->faker->numberBetween($min,$max),
         ];
    }
}
