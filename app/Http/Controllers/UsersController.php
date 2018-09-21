<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

/* use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken; */

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('user_access')){
            return abort(401);
        }
        $users = User::all();
		$title = "User";
        return view('users.index', compact('users','title'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('user_create')){
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
		$agent_types = \App\AgentType::get()->pluck('title', 'id')->prepend('Please select', '');
		$supports = \App\Support::get()->pluck('title', 'id')->prepend('Please select', '');
		$title = "User";
		return view('users.create', compact('roles','agent_types','supports','title'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if(!Gate::allows('user_create')){
            return abort(401);
        }
		
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$name = $first_name .' '. $last_name;
		$request['name'] = $name;
		$area_code = $request->get('area_code');
		$phone = $request->get('phone');
		$phone_number = $area_code.$phone;
		$user = User::create($request->all());
		
		/* $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
		
        $twilio = new Client($accountSid, $authToken);
		$validation_request = $twilio->validationRequests
            ->create($phone_number, // phoneNumber
				array(
					"friendlyName" => "My Home Phone Number"
				)
            );
		echo '<pre>';
		print_r($validation_request->friendlyName);exit; */
		
        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('user_edit')){
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
		$agent_types = \App\AgentType::get()->pluck('title', 'id')->prepend('Please select', '');
		$supports = \App\Support::get()->pluck('title', 'id')->prepend('Please select', '');
        $user = User::findOrFail($id);
		$title = "User";
        return view('users.edit', compact('user', 'roles', 'agent_types', 'supports', 'title'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if(!Gate::allows('user_edit')){
            return abort(401);
        }
        $first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$name = $first_name .' '. $last_name;
		$request['name'] = $name;
		$user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
		$title = "User";
        return view('users.show', compact('user','title'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
