<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function show()
    {
        if(Auth::check()) {
            $id = Auth::id();
            $items = Favorite::where('user_id', $id)->paginate(15);
            return view('blade.favorite', ['items' => $items]);
        } else {
            return redirect('/login');
        }
    }

    public function detail(Request $request)
    {
        $user = Auth::id();
        $id = $request->id;
        $items = Favorite::where('user_id', $user)->where('id', $id)->get();
        return view('blade.favorite-detail', ['items' => $items]);
    }

    public function destroy(Request $request)
    {
        $user = Auth::id();
        $id = $request->id;
        Favorite::where('user_id', $user)->where('id', $id)->delete();
        return redirect('/favorite');
    }

    public function edit_title($id, Request $request)
    {
        $id = $id;
        $edit_title = $request->edit_title;
        Favorite::where('id', $id)->update([
            'title' => $edit_title,
        ]);
        return ['edit_title' => $edit_title];
    }

    public function post(Request $request)
    {
        $id = $request->id;
        $favoriteData = Favorite::find($id);
        Post::create([
            'user_id' => $favoriteData->user_id,
            'title' => $favoriteData->title,
            'start' => $favoriteData->start,
            'end' => $favoriteData->end,
            'place1' => $favoriteData->place1,
            'place2' => $favoriteData->place2,
            'place3' => $favoriteData->place3,
            'place4' => $favoriteData->place4,
            'place5' => $favoriteData->place5,
            'created_at' => $favoriteData->created_at,
            'updated_at' => $favoriteData->updated_at,
        ]);
    }

}
