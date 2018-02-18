<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     foreach (Helpers::USERS as $index => $user) {
       DB::table('users')->insert([
          'name' => $user['name'],
          'email' => $user['email'],
          'password' => bcrypt('secret'),
         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
     }
    }
}