<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Post;

class MapController extends Controller
{
    public function index()
    {
        return view('blade.map');
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
            $post = new Post;
            $id = Auth::id();
            $input = $request->only(['title', 'start', 'end', 'place1', 'place2', 'place3', 'place4', 'place5']);
            $input['user_id'] = $id;
            unset($input['_token']);
            $post->fill($input)->save();
        } else {
            return redirect('/login');
        }
    }



}
