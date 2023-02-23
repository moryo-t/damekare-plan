<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function show()
    {
        if(Auth::check()) {
            $id = Auth::id();
            $items = Post::where('user_id', $id)->paginate(15);
            return view('blade.post', ['items' => $items]);
        } else {
            return redirect('/login');
        }
    }

    public function detail($id)
    {
        $user = Auth::id();
        $id = $id;
        $items = Post::where('user_id', $user)->where('id', $id)->get();
        return view('blade.post-detail', ['items' => $items]);
    }

    public function destroy($id)
    {
        $user = Auth::id();
        $id = $id;
        Post::where('user_id', $user)->where('id', $id)->delete();
        return redirect('/posts');
    }
}