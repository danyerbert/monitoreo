<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Models\RegistrosLlamada;

Route::get('/', function () {
    return view('auth/login');
});


Auth::routes();

//Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'create'])->names('admin.users');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('role', RoleController::class)->names('admin.roles');

Route::resource('estados', App\Http\Controllers\EstadoController::class);
Route::resource('personas', App\Http\Controllers\PersonaController::class);
Route::resource('registros-llamadas', App\Http\Controllers\RegistrosLlamadaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
