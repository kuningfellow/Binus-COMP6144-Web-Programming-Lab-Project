<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'recipient_id' => '1',
            'sender_id' => '2',
            'message' => 'sebuah pesan dari 2 ke 1 (1)'
        ]);
        DB::table('messages')->insert([
            'recipient_id' => '1',
            'sender_id' => '2',
            'message' => 'sebuah pesan dari 2 ke 1 (2)'
        ]);
        DB::table('messages')->insert([
            'recipient_id' => '2',
            'sender_id' => '1',
            'message' => 'sebuah pesan dari 1 ke 2 (1)'
        ]);
    }
}
