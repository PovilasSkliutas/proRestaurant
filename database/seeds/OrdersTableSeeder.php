<?php

use Illuminate\Database\Seeder;
use App\Order; // ideda modeli kaip klase
use Faker\Factory as Faker; // "as" pervadina klases pavadinima

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $faker = Faker::create();

         foreach (range(1, 10) as $x) {
             $order = new Order();
             $order->user_id = rand(1, 10);
             $order->total_amount = $faker->randomFloat(2, 5, 95);
             $order->tax_amount = $faker->randomFloat(2, 5, 95);
             $order->save();
         }
     }
}
