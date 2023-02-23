<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function show()
    {
        if(Auth::check()) {
            $user_id = Auth::id();
            $items = User::find($user_id)->posts()->paginate(15);
            return view('blade.bookmark', ['items' => $items]);
        } else {
            return redirect('/login');
        }

    }
}
