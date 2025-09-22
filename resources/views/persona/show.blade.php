@extends('layouts.app')

@section('template_title')
    {{ $persona->name ?? __('Show') . " " . __('Persona') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Operador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('personas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body text-center bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>No:</strong>
                                    {{ $persona->id_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Completo:</strong>
                                    {{ $persona->nombre_completo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
