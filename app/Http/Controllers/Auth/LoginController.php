<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function guestLogin()
    {
        $name = 'ゲストユーザー';
        $email = 'guest@guest.jp';
        $icon = 'https://ramenhiroba.s3.ap-northeast-1.amazonaws.com/icon/NKOs7vWgmVaS9uoqnpc5rGvy3tQ5XI0xv9CXX6FR.jpg';
        $profile = 'ゲストユーザーです';
        $password = 'guestguest';
        
        if (Auth::attempt(['name' => $name, 'email' => $email, 'icon' => $icon, 'profile' => $profile, 'password' => $password])) {
            return redirect('/');
        }
        
        return redirect('/');
    }
}
