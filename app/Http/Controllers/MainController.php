<?php

namespace App\Http\Controllers;
use App\User;
use App\UserLog;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getMenotrs(Request $request){
        $query = ($request->get('query') != null) ? ($request->get('query')) : '';
        if($query){
            $mentors = User::orderBy('id', 'DESC')
            ->where('role', 2)
            ->where('mentor', 0)
            ->where('activate', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('work_email', 'like', '%' . $query . '%')
            ->orWhere('ugrad_name', 'like', '%' . $query . '%')
            ->orWhere('grad_inst_name', 'like', '%' . $query . '%')
            ->orWhere('skills', 'like', '%' . $query . '%')
            ->orWhere('occupation', 'like', '%' . $query . '%')
            ->orWhere('industry', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->paginate(12);
        }else{
            $mentors = User::orderBy('id', 'DESC')->where('role', 2)->where('mentor', 0)->where('activate', 1)->paginate(12);
        }
        return view('mentors', ['mentors' => $mentors, 'query'=>$query]);
    }

    public function getMentees(Request $request){
        $query = ($request->get('query') != null) ? ($request->get('query')) : '';
        if($query){
            $mentees = User::orderBy('id', 'DESC')
            ->where('role', 2)
            ->where('mentor', 1)
            ->where('activate', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('work_email', 'like', '%' . $query . '%')
            ->orWhere('ugrad_name', 'like', '%' . $query . '%')
            ->orWhere('grad_inst_name', 'like', '%' . $query . '%')
            ->orWhere('skills', 'like', '%' . $query . '%')
            ->orWhere('occupation', 'like', '%' . $query . '%')
            ->orWhere('industry', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->paginate(12);
        }else{
            $mentees = User::orderBy('id', 'DESC')->where('role', 2)->where('mentor', 1)->where('activate', 1)->paginate(12);
        }
        return view('mentee', ['mentees' => $mentees, 'query'=>$query]);
    }

    public function getUserProfile($id){
        $user = User::where('id', $id)->where('activate', 1)->first();
        $userNeed = $user->need;
        $userIndustry = $user->industry;
        $userPassion = $user->passion;
        $rand_users = User::where('activate', 1)->where('need', $userNeed)->limit(5)->get();

        $user->skills;
        $user->hobbies;
        $user->interests;
        $user->certifications;

        if(!$user){
            return redirect('/');
        }

        //return response()->json($user);

        return view('user-profile', ['user' => $user, 'random_users'=>$rand_users]);
    }
}
