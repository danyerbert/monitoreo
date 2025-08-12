@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Asignar') }} Rol</span>
                    </div>
                     @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <p class="h5">Nombre: </p>
                        <p class="form-control">{{ $user->name }}</p>
                        <p class="h4">Listado de Roles</p>
                        <form method="POST" action="{{ url('users', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            @foreach( $roles as $rol )
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $rol->id }}" id="checkChecked" name="roles[]">
                                    <label class="form-check-label" for="checkChecked">
                                        {{ $rol->name }}
                                    </label>
                                </div>
                            @endforeach
                            <div class="col-md-12 mt20 mt-2" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    <button type="submit" class="btn btn-primary">{{ __('Asignar') }}</button>
                                </div>
                                <div class="float-right">
                                    <a class="btn btn-info" href="{{ route('admin.users.index') }}"> {{ __('Volver') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection