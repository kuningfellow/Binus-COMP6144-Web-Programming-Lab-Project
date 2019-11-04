<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'asd',
            'email' => 'asd@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'asd',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'rulia'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'asdd',
            'email' => 'asdd@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'asd',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'rulia'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'asddd',
            'email' => 'asddd@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'asd',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'rulia'
        ]);
    }
}
