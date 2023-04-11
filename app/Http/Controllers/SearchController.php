<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChatRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        return view('blade.search');
    }

    public function show(Request $request)
    {
        $input = $request->input_result;
        $posts = Post::where('title', 'like', '%' . $input . '%')
        ->orWhere('start', 'like', '%' . $input . '%')
        ->orWhere('end', 'like', '%' . $input . '%')
        ->orWhere('place1', 'like', '%' . $input . '%')
        ->orWhere('place2', 'like', '%' . $input . '%')
        ->orWhere('place3', 'like', '%' . $input . '%')
        ->orWhere('place4', 'like', '%' . $input . '%')
        ->orWhere('place5', 'like', '%' . $input . '%')
        ->paginate(15);

        return view('blade.search-result', ['posts' => $posts, 'input' => $input]);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $items = Post::with('chats')->where('id', $id)->get();
        return view('blade.search-detail', ['items' => $items]);
    }

    public function edit_title($id, Request $request)
    {
        $id = $id;
        $edit_title = $request->edit_title;
        Post::where('id', $id)->update([
            'title' => $edit_title,
        ]);
        return ['edit_title' => $edit_title];
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Post::where('id', $id)->delete();
        return redirect('/posts');
    }

    public function bookmark_add($id)
    {
        $user_id = Auth::id();
        $post_id = $id;
        User::find($user_id)->posts()->syncWithoutDetaching($post_id);
    }
    
    public function bookmark_destroy($id)
    {
        $user_id = Auth::id();
        $post_id = $id;
        User::find($user_id)->posts()->detach($post_id);
    }

    public function chat($id, ChatRequest $request)
    {
        $user_id = Auth::id();
        $post_id = $id;
        $message = $request->message;
        Chat::create([
            'post_id' => $post_id,
            'user_id' => $user_id,
            'message' => $message,
        ]);

        $user_name = Auth::user()->name;
        $chatData =  Chat::where('user_id', $post_id)->latest()->first();
        $chat_time = $chatData->created_at;
        $minNot = date('Y-n-j G:i', strtotime($chat_time));

        $data_array = ['name' => $user_name, 'time' => $minNot, 'message' => $message];
        $dataResponse = json_encode($data_array);

        return $dataResponse;
    }
}
