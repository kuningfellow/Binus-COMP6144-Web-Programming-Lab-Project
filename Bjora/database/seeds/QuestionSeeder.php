<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'owner_id' => '1',
            'status' => 'open',
            'topic' => 'A',
            'question' => 'is A a A?',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('questions')->insert([
            'owner_id' => '1',
            'status' => 'open',
            'topic' => 'B',
            'question' => 'is B a B?',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('questions')->insert([
            'owner_id' => '1',
            'status' => 'open',
            'topic' => 'C',
            'question' => 'is C a C?',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
