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
            $mentors = User::where('role', 2)
            ->where('mentor', 0)
            ->where('activate', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('work_email', 'like', '%' . $query . '%')
            ->orWhere('ugrad_name', 'like', '%' . $query . '%')
            ->orWhere('grad_inst_name', 'like', '%' . $query . '%')
            ->orWhere('need', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('industry', 'like', '%' . $query . '%')
            ->orWhere('occupation', 'like', '%' . $query . '%')
            ->orWhere('industry', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhereHas('skills', function($q) use ($query){
                $q->where('skill', 'like', '%' . $query . '%');
            })
            ->orWhereHas('certifications', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('hobbies', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('interests', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else{
            $mentors = User::orderBy('id', 'DESC')->where('role', 2)->where('mentor', 0)->where('activate', 1)->paginate(12);
        }
        return view('mentors', ['mentors' => $mentors, 'query'=>$query]);
    }

    public function getMentees(Request $request){
        $query = ($request->get('query') != null) ? ($request->get('query')) : '';
        if($query){
            $mentees = User::where('role', 2)
            ->where('mentor', 1)
            ->where('activate', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('work_email', 'like', '%' . $query . '%')
            ->orWhere('ugrad_name', 'like', '%' . $query . '%')
            ->orWhere('grad_inst_name', 'like', '%' . $query . '%')
            ->orWhere('need', 'like', '%' . $query . '%')
            ->orWhere('opportunity', 'like', '%' . $query . '%')
            ->orWhere('passion', 'like', '%' . $query . '%')
            ->orWhere('occupation', 'like', '%' . $query . '%')
            ->orWhere('industry', 'like', '%' . $query . '%')
            ->orWhereHas('skills', function($q) use ($query){
                $q->where('skill', 'like', '%' . $query . '%');
            })
            ->orWhereHas('certifications', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('hobbies', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('interests', function($q) use ($query){
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'DESC')
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
        $mergedUsers = User::where('activate', 1)->where('id', '!=', $user->id)
        ->where('mentor', !$user->mentor)
        ->where('need', $userNeed)->where('industry', $userIndustry)->where('passion', $userPassion)
        ->orWhere('need', $userNeed)->where('industry', $userIndustry)
        ->orWhere('need', $userNeed)->where('passion', $userPassion)
        ->orWhere('industry', $userIndustry)->where('passion', $userPassion)
        ->limit(5)->get();


        $user->skills;
        $user->hobbies;
        $user->interests;
        $user->certifications;

        if(!$user){
            return redirect('/');
        }

        //return response()->json($user);

        return view('user-profile', ['user' => $user, 'random_users'=>$mergedUsers]);
    }
}
