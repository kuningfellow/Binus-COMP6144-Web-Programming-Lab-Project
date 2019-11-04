<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'owner' => '1',
            'status' => 'open',
            'topic' => 'A',
            'question' => 'is A a A?'
        ]);
        DB::table('questions')->insert([
            'owner' => '1',
            'status' => 'open',
            'topic' => 'B',
            'question' => 'is B a B?'
        ]);
        DB::table('questions')->insert([
            'owner' => '1',
            'status' => 'open',
            'topic' => 'C',
            'question' => 'is C a C?'
        ]);
    }
}
