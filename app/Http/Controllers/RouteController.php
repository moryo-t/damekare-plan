<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Favorite;

class RouteController extends Controller
{
    public function search_route($id)
    {
        $id = $id;
        $items = Post::where('id', $id)->get();
        return view('blade.route', ['items' => $items]);
    }

    public function favorite_route($id)
    {
        $id = $id;
        $items = Favorite::where('id', $id)->get();
        return view('blade.route', ['items' => $items]);
    }

    public function post_route($id)
    {
        $user = Auth::id();
        $id = $id;
        $items = Post::where('user_id', $user)->where('id', $id)->get();
        return view('blade.route', ['items' => $items]);
    }
}
