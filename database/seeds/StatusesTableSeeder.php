<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();
      foreach (range(1, Helpers::NUMBER_OF_STATUSES) as $i) {
        DB::table('statuses')->insert([
          'content' => $faker->sentence,
          'contact_id' => rand(1, Helpers::NUMBER_OF_CONTACTS), 
           'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
      }

    }
}
