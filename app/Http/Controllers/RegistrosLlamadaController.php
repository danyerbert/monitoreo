<?php

namespace App\Http\Controllers;

use App\Models\RegistrosLlamada;
use App\Models\Persona;
use App\Models\Estado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrosLlamadaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegistrosLlamadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:registro-llamadas.index')->only('index');
        $this->middleware('can:registro-llamadas.edit')->only('edit', 'update');
    }

    public function index(Request $request): View
    {
        $registrosLlamadas = RegistrosLlamada::paginate();

        return view('registros-llamada.index', compact('registrosLlamadas'))
            ->with('i', ($request->input('page', 1) - 1) * $registrosLlamadas->perPage());
    }

    public function create(): View
    {
        $registrosLlamada = new RegistrosLlamada();
        $estados = Estado::get(['id_estado', 'estado']);
        $personas = Persona::get(['id_persona', 'nombre_completo']);

        $now = Carbon::now();

        return view('registros-llamada.create', compact('registrosLlamada','personas', 'estados', 'now'));
    }

    public function store(RegistrosLlamadaRequest $request): RedirectResponse
    {
        RegistrosLlamada::create($request->validated());

        return Redirect::route('registros-llamadas.index')
            ->with('success', 'RegistrosLlamada created successfully.');
    }

    public function show($id): View
    {
        $registrosLlamada = RegistrosLlamada::where('id_registro_llamadas', $id)->firstOrFail();
        $estados = Estado::get(['id_estado', 'estado']);
        $personas = Persona::get(['id_persona', 'nombre_completo']);
        return view('registros-llamada.show', compact('registrosLlamada','personas', 'estados'));
    }

    public function edit($id): View
    {
        $registrosLlamada = RegistrosLlamada::where('id_registro_llamadas', $id)->firstOrFail();
        $estados = Estado::get(['id_estado', 'estado']);
        $personas = Persona::get(['id_persona', 'nombre_completo']);
        return view('registros-llamada.edit', compact('registrosLlamada','personas', 'estados'));
    }

    public function update(RegistrosLlamadaRequest $request, RegistrosLlamada $registrosLlamada): RedirectResponse
    {
        $registrosLlamada->update($request->validated());

        return Redirect::route('registros-llamadas.index')
            ->with('success', 'RegistrosLlamada updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RegistrosLlamada::where('id_registro_llamadas', $id)->delete();

        return Redirect::route('registros-llamadas.index')
            ->with('success', 'RegistrosLlamada deleted successfully');
    }
}
