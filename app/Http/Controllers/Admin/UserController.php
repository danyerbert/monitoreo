<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{

    public function index(Request $request) : View
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create($request->all());

        return view('admin.users.index')->with('success', 'Registro realizado correctamente');
    }
    public function edit(User $user)
    {
        //
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));

    }
    public function update(Request $request, User $user)
    {
        
        $user->roles()->sync($request->roles);
        return Redirect::route('admin.users.edit', $user)
            ->with('success', 'Rol Guardado');
    }

}
