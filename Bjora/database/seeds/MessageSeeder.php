<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'message' => 'sebuah pesan dari 2 ke 1 (1)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('messages')->insert([
            'recipient_id' => '1',
            'sender_id' => '2',
            'message' => 'sebuah pesan dari 2 ke 1 (2)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('messages')->insert([
            'recipient_id' => '2',
            'sender_id' => '1',
            'message' => 'sebuah pesan dari 1 ke 2 (1)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
