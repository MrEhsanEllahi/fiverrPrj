<?php

namespace App\Http\Controllers;
use App\User;
use App\UserLog;
use App\Hobby;
use App\UserHobby;
use App\Interest;
use App\UserInterest;
use App\Passion;
use App\Industry;
use App\Need;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::orderBy('activate')->where('role', 2)->get();
        return view('admin/dashboard', ['users' => $users]);
    }

    public function activateUser($id){
        $user = User::where('id', $id)->first();
        if(!$user){
            redirect('/admin/dashboard')->with('error', 'No User Found');
        }

        $user->update(['activate'=> 1]);

        return redirect('/admin/dashboard')->with('success', 'User account activated.');
    }

    public function deactivateUser($id){
        $user = User::where('id', $id)->first();
        if(!$user){
            redirect('/admin/dashboard')->with('error', 'No User Found');
        }

        $user->update(['activate'=> 0]);

        return redirect('/admin/dashboard')->with('success', 'User account deactivated.');
    }
    
    public function getLogActivity(){
        $logs = UserLog::get();

        return view('admin/logactivity', ['logs' => $logs]);
    }

    public function industry_view(){
        $industries = Industry::all();
        return view('admin/dataview', ['data' => $industries, 'type' => 'industry']);
    }

    public function hobby_view(){
        $hobbies = Hobby::all();
        return view('admin/dataview', ['data' => $hobbies, 'type' => 'hobby']);
    }
    
    public function interest_view(){
        $interests = Interest::all();
        return view('admin/dataview', ['data' => $interests, 'type' => 'interest']);
    }

    public function need_view(){
        $needs = Need::all();
        return view('admin/dataview', ['data' => $needs, 'type' => 'need']);
    }

    public function passion_view(){
        $passions = Passion::all();
        return view('admin/dataview', ['data' => $passions, 'type' => 'passion']);
    }


    public function industry_store(Request $request){
        $industry = Industry::create(['name' => $request->name]);
        return redirect('industries')->with('success', 'Industry Addedd.');
    }

    public function hobby_store(Request $request){
        $hobby = Hobby::create(['name' => $request->name]);
        return redirect('hobbies')->with('success', 'Hobby Addedd.');
    }
    
    public function interest_store(Request $request){
        $interest = Interest::create(['name' => $request->name]);
        return redirect('interests')->with('success', 'Interest Addedd.');
    }

    public function need_store(Request $request){
        $need = Need::create(['name' => $request->name]);
        return redirect('needs')->with('success', 'Need Addedd.');
    }

    public function passion_store(Request $request){
        $passion = Passion::create(['name' => $request->name]);
        return redirect('passions')->with('success', 'Passion Addedd.');
    }


    public function industry_delete($id){
        $industry = Industry::where('id', $id)->first();
        if(!$industry){
            return redirect('industries');    
        }
        $industry->delete();
        return redirect('industries')->with('success', 'Industry Deleted.');
    }

    public function hobby_delete($id){
        $hobby = Hobby::where('id', $id)->first();
        if(!$hobby){
            return redirect('hobbies');    
        }
        $hobby->delete();
        return redirect('hobbies')->with('success', 'Hobby Deleted.');
    }
    
    public function interest_delete($id){
        $interest = Interest::where('id', $id)->first();
        if(!$interest){
            return redirect('interests');    
        }
        $interest->delete();
        return redirect('interests')->with('success', 'Interest Deleted.');
    }

    public function need_delete($id){
        $need = Need::where('id', $id)->first();
        if(!$need){
            return redirect('needs');    
        }
        $need->delete();
        return redirect('needs')->with('success', 'Need Deleted.');
    }

    public function passion_delete(){
        $passion = Passion::where('id', $id)->first();
        if(!$passion){
            return redirect('passions');    
        }
        $passion->delete();
        return redirect('passions')->with('success', 'Passion Deleted.');
    }
}
