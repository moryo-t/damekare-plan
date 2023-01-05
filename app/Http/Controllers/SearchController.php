<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChatRequest;
use App\Models\Post;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function index()
    {
        return view('blade.search');
    }

    public function show(Request $request)
    {
        $input = $request->result;
        $posts = Post::where('start', 'like', '%' . $input . '%')
        ->orWhere('end', 'like', '%' . $input . '%')
        ->orWhere('place1', 'like', '%' . $input . '%')
        ->orWhere('place2', 'like', '%' . $input . '%')
        ->orWhere('place3', 'like', '%' . $input . '%')
        ->orWhere('place4', 'like', '%' . $input . '%')
        ->orWhere('place5', 'like', '%' . $input . '%')->get();

        return view('blade.search-result', ['posts' => $posts, 'input' => $input]);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $items = Post::with('chats')->where('id', $id)->get();
        return view('blade.search-detail', ['items' => $items]);
    }

    public function chat($id, ChatRequest $request)
    {
        $chat = new Chat;
        $user = Auth::id();
        $post_id = $id;
        $message = $request->message;
        $chat->fill([
            'post_id' => $post_id,
            'user_id' => $user,
            'message' => $message,
        ])->save();

        $chatUser = $chat->with('user')->latest()->first();
        $user_name = $chatUser->user->name;
        $chat_time = $chatUser->created_at;
        $minNot = date('Y-n-j G:i', strtotime($chat_time));

        $dataResponse = ['name' => $user_name, 'time' => $minNot, 'message' => $message];
        return $dataResponse;
    }

}
