<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }

    public function updateUserProfile(Request $request){
        $user = Auth::user();
        $input = $request->all();
        $user->fill($input)->save();

        UserLog::create(['user_name' => $user->name, 'activity' => 'Updated the profile.']);

        return redirect('/home')->with('success', 'Successfully Updated!');
    }
}
