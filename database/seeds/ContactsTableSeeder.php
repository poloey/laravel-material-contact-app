<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Factory::create();
      foreach (range(1, Helpers::NUMBER_OF_CONTACTS) as $i) {
        $name = $faker->name;
        $slug_name = str_slug($name);
        DB::table('contacts')->insert([
          [
            'name' => $name,
            'mobile' => $faker->tollFreePhoneNumber,
            'email' => $faker->email,
            'city' => $faker->city,
            'address' => $faker->address,
            'facebook' => $slug_name,
            'twitter' => $slug_name,
            'linkedin' => $slug_name,
            'user_id' => rand(1, count(Helpers::USERS)),
           'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]
        ]);
      }

    }
}
