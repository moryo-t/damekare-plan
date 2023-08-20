<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Image;

use Psy\Readline\Hoa\Console;

class MapCreateController extends Controller
{
    public function post_create_upload(Request $request) {
        $user_id = Auth::id();
        $sessionData = json_decode($request->session()->get($user_id . '-' . 'postJsonData'));

        $post = new Post();
        $post->user_id = $user_id;
        
        foreach ($sessionData->places as $placeData) {
            switch ($placeData->pinName) {
                case 'S':
                    $post->start = json_encode($placeData);
                    break;
                case 'E':
                    $post->end = json_encode($placeData);
                    break;
                case '1':
                    $post->place1 = json_encode($placeData);
                    break;
                case '2':
                    $post->place2 = json_encode($placeData);
                    break;
                case '3':
                    $post->place3 = json_encode($placeData);
                    break;
                case '4':
                    $post->place4 = json_encode($placeData);
                    break;
                case '5':
                    $post->place5 = json_encode($placeData);
                    break;
            }
        }
        
        $post->setting = json_encode($sessionData->settings);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->price = $request->input('price');
        
        $post->save();


        $post_id = $post->id;
        $files = $request->file('images');
        $uploadedFilePaths = [];

        foreach ($files as $file) {
            $filePath = 'user-' . $user_id . '/' . 'post-' . $post_id . '/' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            array_push($uploadedFilePaths, $filePath);
        }

        foreach ($uploadedFilePaths as $filePath) {
            Image::create([
                'post_id' => $post_id,
                'file_path' => $filePath,
            ]);
        }





        //$fileContents = Storage::disk('s3')->get('1-2023-08-06 22:49:19/TrYVyaxLTnbDUlxjjcqdQKmhAtqWE5r7AZh39fFC.jpg');

        //$imageUrl = 'data:image/jpeg;base64,' . base64_encode($fileContents);
        //return response()->json(['imageUrl' => $imageUrl]);
        //$postSessionData = $request->session()->get($id . '-' . 'postJsonData');
        /*
                Log::debug($request);

        $id = Auth::id();
        $timestamp = Carbon::now()->timestamp;

        $files = $request->file('formData');
        $fileDirectory = $id . '-' . $timestamp;
        foreach ($files as $file) {
            $fileUpload = Storage::disk('s3')->put($fileDirectory, $file);
            $filePath = Storage::disk('s3')->url($fileUpload);
            $decodedFilePaths = urldecode($filePath);
        }

        Log::debug(Carbon::createFromTimestamp($timestamp));



                $user_id = Auth::id();
        $files = $request->file('formData');
        $uploadedFilePaths = [];

        foreach ($files as $file) {
            $filePath = $user_id . '/' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $uploadedFilePaths[] = $filePath;
        }

        foreach ($uploadedFilePaths as $filePath) {
            $post = new Post;
            Log::debug($post->latest()->first('id')->id + 1);
        }
        Log::debug($request->session()->get($user_id . '-' . 'postJsonData'));










                $arrayAllData = [];
        $arrayAllData['user_id'] = $user_id;
        $sessionData = json_decode($request->session()->get($user_id . '-' . 'postJsonData'));
        foreach ($sessionData->places as $placeData) {
            switch ($placeData->pinName) {
                case 'S':
                    $arrayAllData['start'] = json_encode($placeData);
                    break;
                case 'E':
                    $arrayAllData['end'] = json_encode($placeData);
                    break;
                case '1':
                    $arrayAllData['place1'] = json_encode($placeData);
                    break;
                case '2':
                    $arrayAllData['place2'] = json_encode($placeData);
                    break;
                case '3':
                    $arrayAllData['place3'] = json_encode($placeData);
                    break;
                case '4':
                    $arrayAllData['place4'] = json_encode($placeData);
                    break;
                case '5':
                    $arrayAllData['place5'] = json_encode($placeData);
                    break;
            }
        }

        $arrayAllData['setting'] = json_encode($sessionData->settings);

        $arrayAllData['title'] = $request->input('title');
        $arrayAllData['body'] = $request->input('body');
        $arrayAllData['price'] = $request->input('price');

        DB::table('posts')->insert($arrayAllData);


*/
    }
}

