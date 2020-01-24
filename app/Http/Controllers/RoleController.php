<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Traits\RolesAndPermissionsHelpersTrait;
use jeremykenedy\LaravelRoles\Traits\RolesUsageAuthTrait;


class RoleController extends Controller
{
    use RolesAndPermissionsHelpersTrait;
    use RolesUsageAuthTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $item = User::all()->toArray();
        $roleAdmin = Role::first()->users()->with('roles')->get()->toArray();
        $roleUser = User::first()->roles()->with('users')->get();

        $user = config('roles.models.defaultUser')::whereHas('roles')->get();
        return view('role', compact('item', 'roleAdmin','roleUser'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = config('roles.models.defaultUser')::find($id);
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $role = $user->attachRole($role);
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = config('roles.models.defaultUser')::find($id);
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $role = $user->detachRole($role);

        //$user->attachRole($role);
        return redirect('/role');
    }
}
