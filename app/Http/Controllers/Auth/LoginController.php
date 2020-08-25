<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\UserLog;
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
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectTo(){
        // User role
        $role = Auth::user()->role;
        // Check user role
    switch ($role) {
        case 1:
            UserLog::create(["user_name"=> Auth::user()->name, "activity"=>"Logged in"]);
                return '/admin/dashboard';
            break;
        case 2:
            UserLog::create(["user_name"=> Auth::user()->name, "activity"=>"Logged in"]);
                return '/home';
            break; 
        default:
                return '/login'; 
            break;
    } 
    }
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
}
