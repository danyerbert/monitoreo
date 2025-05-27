@extends('layouts.app')

@section('template_title')
    {{ $estado->name ?? __('Show') . " " . __('Estado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estados.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body text-center bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>No:</strong>
                                    {{ $estado->id_estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $estado->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
