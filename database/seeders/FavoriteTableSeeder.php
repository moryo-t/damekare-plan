<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'title' => '初投稿',
            'start' => '初投稿',
            'end' => '初投稿',
            'place1' => '初投稿',
            'place2' => '初投稿',
            'place3' => '初投稿',
            'place4' => '初投稿',
            'place5' => '初投稿',
            'created_at' => '2022-12-02 04:13:12',
        ];

        DB::table('posts')->insert($param);

    }
}
