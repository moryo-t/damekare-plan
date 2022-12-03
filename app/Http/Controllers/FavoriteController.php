<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class FavoriteController extends Controller
{
    public function show()
    {
        if(Auth::check()) {
            $id = Auth::id();
            $items = Favorite::where('user_id', $id)->get();
            return view('blade.favorite', ['items' => $items]);
        } else {
            return redirect('/login');
        }
    }

    public function detail($id)
    {
        $user = Auth::id();
        $id = $id;
        $items = Favorite::where('user_id', $user)->where('id', $id)->get();
        return view('blade.favorite-detail', ['items' => $items]);
    }

    public function destroy($id)
    {
        $user = Auth::id();
        $id = $id;
        Favorite::where('user_id', $user)->where('id', $id)->delete();
        return redirect('/favorite');
    }
}
