<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

    public function detail($id)
    {
        $id = $id;
        $items = Post::where('id', $id)->get();
        return view('blade.search-detail', ['items' => $items]);
    }
}
