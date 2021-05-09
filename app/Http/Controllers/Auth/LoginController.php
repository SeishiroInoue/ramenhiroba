<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Session;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo() {
      Session::flash('flash_message', 'ログインしました！');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    private const GUEST_USER_ID = 1;
    
    public function guestLogin(Request $request)
    {
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {
            Session::flash('flash_message', 'ゲストログインしました！');
            return redirect('/');
        }
        
        return redirect('/');
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        Session::flash('flash_message', 'ログアウトしました！');
    
        return $this->loggedOut($request) ?: redirect('/');
    }
}