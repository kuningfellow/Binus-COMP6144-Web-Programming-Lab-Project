<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('answers')->insert([
            'question_id' => '1',
            'owner_id' => '2',
            'answer' => 'answer 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('answers')->insert([
            'question_id' => '1',
            'owner_id' => '3',
            'answer' => 'answer 3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('answers')->insert([
            'question_id' => '2',
            'owner_id' => '1',
            'answer' => 'answer 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('answers')->insert([
            'question_id' => '2',
            'owner_id' => '2',
            'answer' => 'answer 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('answers')->insert([
            'question_id' => '3',
            'owner_id' => '1',
            'answer' => 'answer 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
