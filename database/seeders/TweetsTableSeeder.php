<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert([
            'user_id' => 2,
            'body' => 'Make doing training great again',
            'created_at' => now(),
        ]);

        DB::table('tweets')->insert([
            'user_id' => 2,
            'body' => 'All hail King Rhodesy',
            'created_at' => now(),
        ]);

        DB::table('tweets')->insert([
            'user_id' => 2,
            'body' => 'I love salad!',
            'created_at' => now(),
        ]);

        DB::table('tweets')->insert([
            'user_id' => 3,
            'body' => 'TGI Fridays.',
            'created_at' => now(),
        ]);
    }
}
