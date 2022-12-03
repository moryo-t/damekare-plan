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
            'title' => 'シーダー',
            'start' => '日本、愛知県豊山町豊場幸田１９７−１ ファンタジーキッズリゾート名古屋北',
            'end' => '日本、愛知県名古屋市中村区名駅２丁目４２−２ GLITCH COFFEE @9h 名古屋',
            'place1' => '日本、愛知県美浜町奥田儀路４２８−１ 南知多ビーチランド
            ',
            'place1' => 'スカイツリー',
            'place2' => 'スカイツリー',
            'place3' => 'スカイツリー',
            'place4' => 'スカイツリー',
            'place5' => 'スカイツリー',

        ];
        DB::table('favorites')->insert($param);

    }
}
