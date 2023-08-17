<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePostsTableToJson extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $location_name = DB::table('posts')->select('id', 'start', 'end', 'place1', 'place2', 'place3', 'place4', 'place5')->get();

            foreach ($location_name as $location) {
                $update_json = [];
                if (isset($location->start)) {
                    $location_arr = ['pinName' => 'S', 'location' => $location->start];
                    $update_json['start'] = json_encode($location_arr);
                }
                if (isset($location->end)) {
                    $location_arr = ['pinName' => 'E', 'location' => $location->start];
                    $update_json['end'] = json_encode($location_arr);
                }
                if (isset($location->place1)) {
                    $location_arr = ['pinName' => '1', 'location' => $location->start];
                    $update_json['place1'] = json_encode($location_arr);
                }
                if (isset($location->place2)) {
                    $location_arr = ['pinName' => '2', 'location' => $location->start];
                    $update_json['place2'] = json_encode($location_arr);
                }
                if (isset($location->place3)) {
                    $location_arr = ['pinName' => '3', 'location' => $location->start];
                    $update_json['place3'] = json_encode($location_arr);
                }
                if (isset($location->place4)) {
                    $location_arr = ['pinName' => '4', 'location' => $location->start];
                    $update_json['place4'] = json_encode($location_arr);
                }
                if (isset($location->place5)) {
                    $location_arr = ['pinName' => '5', 'location' => $location->start];
                    $update_json['place5'] = json_encode($location_arr);
                }
                DB::table('posts')->where('id', $location->id)->update($update_json);
            }

            $table->json('start')->change();
            $table->json('end')->nullable()->change();
            $table->json('place1')->nullable()->change();
            $table->json('place2')->nullable()->change();
            $table->json('place3')->nullable()->change();
            $table->json('place4')->nullable()->change();
            $table->json('place5')->nullable()->change();
            $table->text('body')->nullable();
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('start')->change();
            $table->string('end')->nullable()->change();
            $table->string('place1')->nullable()->change();
            $table->string('place2')->nullable()->change();
            $table->string('place3')->nullable()->change();
            $table->string('place4')->nullable()->change();
            $table->string('place5')->nullable()->change();
            $table->dropColumn('body');
        });
    }
}
