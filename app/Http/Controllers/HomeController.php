<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Industry;
use App\Interest;
use App\Need;
use App\Passion;
use App\UserLog;
use Auth;
use Illuminate\Http\Request;

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
        $industries = Industry::all();
        $hobbies = Hobby::all();
        $interests = Interest::all();
        $needs = Need::all();
        $passions = Passion::all();
        $user = Auth::user();
        return view('home', ['user' => $user, 'industries' => $industries, 'hobbies' => $hobbies,
        'needs' => $needs, 'interests' => $interests, 'passions' => $passions]);
    }

    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->fill($input)->save();

        UserLog::create(['user_name' => $user->name, 'activity' => 'Updated the profile.']);

        return redirect('/home')->with('success', 'Successfully Updated!');
    }
}
