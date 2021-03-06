<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = \App\Models\acl_roles::all();
        return view('acl.role.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getPermissions(Request $request)
    {
        $role = \App\Models\acl_roles::find($request->role_id);
        $permissions = $role->acl_permissions;
        $permissions_list = \App\Models\acl_permission::all();
        $response = [
            'permissions' => $permissions,
            'permissions_list' => $permissions_list
        ];
        return response()->json($response, 200);
    }
    public function addPermission(Request $request)
    {
        $role = \App\Models\acl_roles::find($request->role_id);
        $role->acl_permissions()->detach();
        $role->acl_permissions()->attach($request->selected_permission);
        return response()->json(['success' => 'Permission added successfully.'], 200);
    }
}
