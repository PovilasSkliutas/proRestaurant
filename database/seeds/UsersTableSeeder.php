<?php

use Illuminate\Database\Seeder;
use App\User; // ideda modeli kaip klase
use Faker\Factory as Faker; // "as" pervadina klases pavadinima

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
            $user = new User();
            $user->name = $faker->firstName;
            $user->surname = $faker->lastName;
            $user->birthday = '2010-10-10';
            $user->email = 'admin@admin.lt';
            $user->password = \Hash::make('admin');
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->streetAddress;
            $user->city = $faker->city;
            $user->zipcode = $faker->postcode;
            $user->country = $faker->country;
            $user->role = 'admin';
            $user->save();

        foreach (range(1, 10) as $x) {
            $user = new User();
            $user->name = $faker->firstName;
            $user->surname = $faker->lastName;
            $user->birthday = $faker->date($format = 'Y-m-d', $max = 'now');
            $user->email = $faker->email;
            $user->password = \Hash::make('simple');
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->streetAddress;
            $user->city = $faker->city;
            $user->zipcode = $faker->postcode;
            $user->country = $faker->country;
            $user->role = 'simple';
            $user->save();
        }
    }
}
