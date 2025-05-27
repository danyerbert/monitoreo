<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrosLlamada;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $atendio = RegistrosLlamada::select(DB::raw());
        return view('home');
    }
}
