<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followers')->insert([
            'user_id' => 1,
            'following_id' => 2,
        ]);

        DB::table('followers')->insert([
            'user_id' => 1,
            'following_id' => 3,
        ]);

        DB::table('followers')->insert([
            'user_id' => 2,
            'following_id' => 1,
        ]);
    }
}
