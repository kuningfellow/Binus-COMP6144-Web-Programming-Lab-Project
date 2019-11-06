<?php

use Illuminate\Database\Seeder;

class TopicOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topic_options')->insert([
            'topic' => 'Data Structures',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Ad Hoc',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Dynamic Programming',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Graph',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Math',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'FFT',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Geometry',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Binary Search',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Bitmask',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Brute Force',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Constructive Algorithm',
        ]);
        DB::table('topic_options')->insert([
            'topic' => 'Game Theory',
        ]);
    }
}
