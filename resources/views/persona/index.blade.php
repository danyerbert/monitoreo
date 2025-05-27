@extends('layouts.app')

@section('template_title')
    Personas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personas') }}
                            </span>
                            @can('personas.create')
                             <div class="float-right">
                                <a href="{{ route('personas.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Registrar') }}
                                </a>
                              </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th >No</th>
                                        <th >Nombre Completo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
										<td >{{ $persona->id_persona }}</td>
										<td >{{ $persona->nombre_completo }}</td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personas.show',$persona->id_persona) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ url('personas/'. $persona->id_persona.'/edit') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <form action="{{ url('personas/'. $persona->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
