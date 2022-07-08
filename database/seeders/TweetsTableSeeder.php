<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        ]);

        DB::table('tweets')->insert([
            'user_id' => 2,
            'body' => 'I love salad!',
        ]);

        DB::table('tweets')->insert([
            'user_id' => 3,
            'body' => 'TGI Fridays.',
        ]);
    }
}
