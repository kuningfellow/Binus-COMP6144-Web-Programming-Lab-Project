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
            'name' => 'Authoritah',
            'email' => 'admin@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Another world',
            'date_of_birth' => '1350-3-1',
            'profile_picture' => 'pic01'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Zero Two',
            'email' => 'zerotwo@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Darling in The Franxx',
            'date_of_birth' => '9010-5-1',
            'profile_picture' => 'pic02'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Hiro',
            'email' => 'hiro@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'Darling in The Franxx',
            'date_of_birth' => '2910-2-1',
            'profile_picture' => 'pic03'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Kaori Miyazono',
            'email' => 'kaori_miyazono@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Your Lie in April',
            'date_of_birth' => '4010-5-3',
            'profile_picture' => 'pic04'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Kousei Arima',
            'email' => 'kousei_arima@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'Your Lie in April',
            'date_of_birth' => '1092-12-4',
            'profile_picture' => 'pic05'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Mai Sakurajima',
            'email' => 'mai_sakurajima@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Seishun Buta Yarou wa Bunny Girl Senpai',
            'date_of_birth' => '2398-8-19',
            'profile_picture' => 'pic06'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Rem',
            'email' => 'rem@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Re Zero',
            'date_of_birth' => '1002-9-29',
            'profile_picture' => 'pic07'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Ram',
            'email' => 'ram@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Re Zero',
            'date_of_birth' => '1002-9-29',
            'profile_picture' => 'pic08'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Felix Argyle',
            'email' => 'felix_argyle@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'Re Zero',
            'date_of_birth' => '1224-11-02',
            'profile_picture' => 'pic09'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Astolfo',
            'email' => 'astolfo@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'male',
            'address' => 'Fate Apocrypha',
            'date_of_birth' => '0069-10-21',
            'profile_picture' => 'pic10'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Emilia',
            'email' => 'emilia@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Re Zero',
            'date_of_birth' => '1008-6-20',
            'profile_picture' => 'pic11'
        ]);
        DB::table('users')->insert([
            'role' => 'member',
            'name' => 'Chtholly Nota Seniorious',
            'email' => 'chtoholly@asd',
            'password' => bcrypt('asdasd'),
            'gender' => 'female',
            'address' => 'Shuumatsu Nani Shitemasu ka? Isogashii Desu ka? Sukutte Moratte Ii Desu ka?',
            'date_of_birth' => '0024-2-28',
            'profile_picture' => 'pic12'
        ]);
    }
}
