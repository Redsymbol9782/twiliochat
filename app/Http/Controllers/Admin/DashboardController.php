<?php

namespace App\Http\Controllers\Admin;

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
		/* $authUser = Auth::user();
		$role = DB::table('roles')->where('id',$authUser['role_id'])->first();
		if($role->title == 'Customer'){
			return redirect()->intended('/');
		}else{ */
		return view('admin.dashboard');
		//}
    }
}
