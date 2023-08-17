<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function redirectTo()
    {
        // ログイン前のURLを取得
        $previousUrl = session('previous_url');

        if ($previousUrl) {
            // ログイン前のURLがある場合はそのURLにリダイレクト
            return $previousUrl;
        } else {
            // ログイン前のURLがない場合はデフォルトのリダイレクト先に遷移
            return '/'; // デフォルトのリダイレクト先を変更する場合はここを変更
        }
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
