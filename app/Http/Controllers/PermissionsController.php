<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionsRequest;
use App\Http\Requests\UpdatePermissionsRequest;

class PermissionsController extends Controller
{
    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('permission_access')) {
            return abort(401);
        }

        $permissions = Permission::all();
		$title = "Permission";
        return view('permissions.index', compact('permissions','title'));
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('permission_create')) {
            return abort(401);
        }
		$title = "Permission";
        return view('permissions.create',compact('title'));
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\StorePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionsRequest $request)
    {
        if (! Gate::allows('permission_create')) {
            return abort(401);
        }
        $permission = Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success','Permission added successfully!');
    }


    /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('permission_edit')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
		$title = "Permission";
        return view('permissions.edit', compact('permission','title'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionsRequest $request, $id)
    {
        if (! Gate::allows('permission_edit')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success','Permission updated successfully!');
    }


    /**
     * Display Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('permission_view')) {
            return abort(401);
        }
        $users = \App\User::where('permission_id', $id)->get();

        $permission = Permission::findOrFail($id);
		$title = "Permission";
        return view('permissions.show', compact('permission', 'users', 'title'));
    }


    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('permission_delete')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success','Permission deleted successfully!');
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('permission_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
