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
            'post_id' => '1',
            'user_id' => '2',
            'message' => 'はま寿司www',
            'created_at' => '2022-12-02 04:13:12',
        ];



        DB::table('chats')->insert($param);

    }
}
