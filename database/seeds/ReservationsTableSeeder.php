<?php

use Illuminate\Database\Seeder;
use App\Reservation; // ideda modeli kaip klase
use Faker\Factory as Faker; // "as" pervadina klases pavadinima

class ReservationsTableSeeder extends Seeder
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
            $reservation = new Reservation();
            $reservation->name = $faker->name;
            $reservation->people_amount = rand(1, 10);
            $reservation->date = $faker->date($format = 'Y-m-d', $max = 'now');
            $reservation->time = $faker->time($format = 'H:i:s', $max = 'now');
            $reservation->phone = $faker->phoneNumber;
            $reservation->user_id = $x;
            $reservation->save();
        }
    }
}
