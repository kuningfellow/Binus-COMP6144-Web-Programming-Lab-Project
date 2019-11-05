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
            'role' => 'admin',
            'name' => 'Madeline',
            'email' => 'Leo@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'bukan Binus Square :(',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'rabbit'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Wigun',
            'email' => 'Wigun@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'Binus Square',
            'date_of_birth' => '9010-5-1',
            'profile_picture' => 'kucing'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'asd',
            'email' => 'asd@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'asd',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'aaasssddd'
        ]);
    }
}
