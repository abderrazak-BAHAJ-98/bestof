<?php

namespace Database\Seeders;
use App\Models\User;
use Database\Seeders\FavoriteSeeder ;
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
        //Execute Seeder 
         User::factory(5)->create();
         $this->call(CategorySeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(FavoriteSeeder::class);
         $this->call(CardSeeder::class);
         $this->call(CartSeeder::class);
         $this->call(RateSeeder::class);
         $this->call(OrderSeeder::class);
    }
}
