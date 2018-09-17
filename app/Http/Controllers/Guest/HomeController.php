<?php

namespace App\Http\Controllers\Guest;

/* use App\Event;
use App\Ticket; */
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Auth,DB;
/* use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest; */

class HomeController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::check()){
			$authUser = Auth::user();
			$role = DB::table('roles')->where('id',$authUser['role_id'])->first();
			if($role->title == 'Customer'){
				return view('guest.home');
			}else{
				return view('admin.dashboard');
			}
		}else{
			return view('guest.home');
		}
    }    
}
