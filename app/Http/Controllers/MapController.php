<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Illuminate\Support\Facades\Session;

class MapController extends Controller
{
    public function index()
    {
        return view('blade.map');
    }

    public function post_create(Request $request)
    {
        $post_create_request = $request->getContent();
        return response()->json(['map_data' => $post_create_request]);
    }

    public function post_create_result(Request $request)
    {
        $id = Auth::id();
        $postJsonData = $request->input('input_name_response');
        $request->session()->put($id . '-' . 'postJsonData', $postJsonData);
        $mapCreateData = json_decode($postJsonData, true);
        return view('blade.map-create', ['mapsData' => $mapCreateData['places'], 'mapSetting' => $mapCreateData['settings']]);
    }

    public function favorite(Request $request)
    {
        if(Auth::check()) {
            $favorite = new Favorite;
            $id = Auth::id();
            $input = $request->only(['title', 'start', 'end', 'place1', 'place2', 'place3', 'place4', 'place5']);
            $input['user_id'] = $id;
            unset($input['_token']);
            $favorite->fill($input)->save();
        } else {
            return redirect('/login');
        }
    }

    public function plan(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::id();
            $json_data = json_decode($request->input('json_data'), true);
            $request_input = $request->input();


            foreach ($request_input as $input) {
            }

        } else {
            return redirect('/login');
        }
    }

}
