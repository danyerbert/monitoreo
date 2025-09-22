@extends('layouts.app')

@section('template_title')
    {{ $registrosLlamada->name ?? __('Show') . " " . __('Registros Llamada') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Registros Llamada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('registros-llamadas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body text-center bg-white">
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona:</strong>
                                    {{ $registrosLlamada->persona->nombre_completo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $registrosLlamada->estado->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Contacto:</strong>
                                    {{ $registrosLlamada->fecha_contacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hora Contacto:</strong>
                                    {{ $registrosLlamada->hora_contacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Atendio Llamada:</strong>
                                    {{ $registrosLlamada->atendio_llamada }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Observaciones:</strong>
                                    {{ $registrosLlamada->observaciones }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
