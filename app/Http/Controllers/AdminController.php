<?php

namespace App\Http\Controllers;
use App\User;
use App\UserLog;
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
}
