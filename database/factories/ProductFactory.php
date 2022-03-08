<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(25);
        $price =$this->faker->numberBetween(100,900);
        return [
            'p_name' => $name,
            'p_slug' =>  Str::slug($name),
            'p_description' => $this->faker->text(),
            'p_image_1' => $this->faker->imageUrl(150,300),
            'p_image_2' => $this->faker->imageUrl(150,300),
            'p_image_3' => $this->faker->imageUrl(150,300),
            'p_image_4' => $this->faker->imageUrl(150,300),
            'p_color' => $this->faker->colorName(),
            'p_price' => $price,
            'category_id' => $this->faker->numberBetween(1,5),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
