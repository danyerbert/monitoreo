<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrosLlamada;
use Carbon\Carbon;
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
    public function index(Request $request)
    {
        /*$now = Carbon::now();
        $fecha_actual = $now->format('Y-m-d');*/
        $fechaBusqueda = $request->input('fecha', Carbon::now()->format('Y-m-d'));
        $atendio = RegistrosLlamada::select('atendio_llamada', DB::raw('COUNT(*) as total'))
        ->whereDate('fecha_contacto', $fechaBusqueda)
        ->groupBy('atendio_llamada')
        ->get();
        // Inicializar arrays para las etiquetas y los datos
        $labels = [];
        $data = [];
        // Rellenar los arrays con los datos obtenidos
        foreach ($atendio as $item) {
            $labels[] = $item->atendio_llamada ? 'Atendida' : 'No Atendida';
            $data[] = $item->total;
        }
        $noatendiollamadas = RegistrosLlamada::all()->where('fecha_contacto', $fechaBusqueda);
        return view('home', [
            'chartLabels' => $labels,
            'chartData' => $data
        ], 
        compact('noatendiollamadas'));
    }
}
