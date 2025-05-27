<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permission = Permission::all();
        return view('admin.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('success', 'Rol Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        $permission = Permission::all();
        return view('admin.roles.edit', compact('role', 'permission'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.edit', $role)->with('success', 'Rol Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Rol Actualizado Correctamente');
    }
}
