<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('user')->insert([
            'first_name' => 'abhi',
            'last_name' => 'garg',
            'email' => 'abhi@gmail.com',
            'password' => 'abhi',
        ]);
    }
}
