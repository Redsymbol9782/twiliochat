<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth,DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title = "Dashboard";
		$authUser = Auth::user();
		$role = DB::table('roles')->where('id',$authUser['role_id'])->first();
		if($role->title == 'Customer'){
			$authy_verify = DB::table('users')->where('id',$authUser['id'])->first();
			if($authy_verify->verified == 0){
				return redirect('verify_caller_id');
			}else{
				return view('dashboard',compact('title'));
			}
		}else{ 
			return view('dashboard',compact('title'));
		}
    }
}
