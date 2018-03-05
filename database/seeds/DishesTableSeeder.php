<?php

use Illuminate\Database\Seeder;
use App\Dish; // ideda modeli kaip klase
use Faker\Factory as Faker; // "as" pervadina klases pavadinima


class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 2) as $x) {
            $url = $faker->image('/home/vagrant/Code/proRestaurant/public/tmp', 800, 600, 'food');
            $url = str_replace('/home/vagrant/Code/proRestaurant/public/', '', $url);

            $dish = new Dish();
            $dish->title = $faker->name;
            $dish->description = $faker->text;
            $dish->image_url = $url;
            $dish->price = $faker->randomFloat(2, 5, 95);
            $dish->save();
        }
    }
}
