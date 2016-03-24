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
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'id_card' => '123456789',
            'phone' => '01656129573',
            'gender' => 'nam',
            'password' => bcrypt('secret'),
            'birth_day' => \Carbon\Carbon::now(),
            'address' => 'Bac Ninh',
            'role' => 'admin',
            'status' => 'active',
            'updated_at' =>  \Carbon\Carbon::now(),
            'created_at' =>  \Carbon\Carbon::now()
        ]);
    }
}
