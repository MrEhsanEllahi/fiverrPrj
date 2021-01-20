<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Industry;
use App\Interest;
use App\Need;
use App\Passion;
use App\UserLog;
use App\UserSkill;
use App\UserCertification;
use App\UserHobby;
use App\UserInterest;
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
        $user->skills;
        $user->hobbies;
        $user->interests;
        $user->certifications;

        return view('home', ['user' => $user, 'industries' => $industries, 'hobbies' => $hobbies,
        'needs' => $needs, 'interests' => $interests, 'passions' => $passions]);
    }

    public function updateUserProfile(Request $request)
    {

        $user = Auth::user();
        $input = $request->all();

        $skills = $input['skill'];
        $skills_levels = $input['skill_level'];
        $user_hobbies = $request->hobbies;
        $user_interests = $request->interests;

        UserHobby::where('user_id', $user->id)->delete();
        UserInterest::where('user_id', $user->id)->delete();
        UserSkill::where('user_id', $user->id)->delete();

        $user->fill($input)->save();

        if($request->need != 'Job'){
            $user->update(['job_details' => '']);
        }
        
        foreach($skills as $skey=>$value){
            UserSkill::create([
                'user_id' => $user->id,
                'skill' => $value,
                'level' => $skills_levels[$skey]
            ]);
        }

        foreach($user_hobbies as $hobby){
            UserHobby::create([
                'user_id' => $user->id,
                'name' => $hobby,
            ]);
        }

        foreach($user_interests as $ints){
            UserInterest::create([
                'user_id' => $user->id,
                'name' => $ints,
            ]);
        }

        UserLog::create(['user_name' => $user->name, 'activity' => 'Updated the profile.']);
        //return redirect('/home')->with('success', 'Successfully Updated!');
    }
}
