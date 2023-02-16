<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function quit()
    {
        $user_id = Auth::id();
        User::find($user_id)->delete();
        Auth::logout();
    }
}
