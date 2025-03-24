<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $user)
    {

      $user = User::find($user);
      $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
//        dd($request->all(), $request["user_id"]);
        $user = User::find($request["user_id"]);
//        dd($user);

//        dd($request->roles , $user->name);
        $user->roles()->sync($request->input('roles', [])); // ✅ Corrección aquí

        return redirect()->route('admin.user.edit', $request->input('user_id'))
            ->with('info', 'Se asignaron los roles correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
