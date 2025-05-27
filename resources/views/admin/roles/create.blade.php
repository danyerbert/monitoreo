@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Rol
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Registrar') }} Rol</span>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <form action="{{ route('admin.roles.store') }}" method="POST"  role="form" enctype="multipart/form-data">
                        @csrf
                            <div class="row padding-1 p-1">
                                <div class="col-md-12">
                                    <div class="form-group mb-2 mb20">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre del rol">
                                        @error('name')
                                            <small class="text-danger">
                                                {{$message}}
                                            </small>
                                        @enderror
                                    </div>
                                    <p class="h4 form-group mb-2 mb20">Lista de Permisos</p>
                                    @foreach( $permission as $permissio )
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $permissio->id }}" id="checkChecked" name="permissions[]">
                                            <label class="form-check-label" for="checkChecked">
                                                {{ $permissio->description }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <div class="col-md-12 mt20 mt-2" style="display: flex; justify-content: space-between; align-items: center;">
                                        <div class="float-left">
                                            <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
                                        </div>
                                        <div class="float-right">
                                            <a class="btn btn-info" href="{{ route('admin.roles.index') }}"> {{ __('Volver') }}</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection