<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'question_id' => '1',
            'owner_id' => '1',
            'answer' => 'answer 1',
        ]);
        DB::table('answers')->insert([
            'question_id' => '1',
            'owner_id' => '2',
            'answer' => 'answer 2',
        ]);
        DB::table('answers')->insert([
            'question_id' => '1',
            'owner_id' => '3',
            'answer' => 'answer 3',
        ]);
        DB::table('answers')->insert([
            'question_id' => '2',
            'owner_id' => '1',
            'answer' => 'answer 1',
        ]);
        DB::table('answers')->insert([
            'question_id' => '2',
            'owner_id' => '2',
            'answer' => 'answer 2',
        ]);
        DB::table('answers')->insert([
            'question_id' => '3',
            'owner_id' => '1',
            'answer' => 'answer 1',
        ]);
    }
}
