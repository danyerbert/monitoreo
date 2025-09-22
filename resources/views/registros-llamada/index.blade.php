@extends('layouts.app')

@section('template_title')
    Registros Llamadas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registros Llamadas') }}
                            </span>

                            <div class="float-right">
                                <form action="{{ route('registros-llamadas.index') }}" method="GET" class="d-flex align-items-center">
                                <div class="form-group">
                                    <label for="fecha">Buscar por Fecha:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha">
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                            </div>
                             <div class="float-right">
                                <a href="{{ route('registros-llamadas.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Registrar') }}
                                </a>
                              </div>
                              
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
                                        <th>No</th>
									    <th>Persona</th>
									    <th>Estado</th>
									    <th>Fecha Contacto</th>
									    <th>Hora Contacto</th>
									    <th>Numero Llamada</th>
									    <th>Atendio Llamada</th>
									    <th>Observaciones</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registrosLlamadas as $registrosLlamada)
                                        <tr>
										    <td >{{ $registrosLlamada->id_registro_llamadas }}</td>
										    <td >{{ $registrosLlamada->persona->nombre_completo }}</td>
										    <td >{{ $registrosLlamada->estado->estado }}</td>
										    <td >{{ $registrosLlamada->fecha_contacto }}</td>
										    <td >{{ $registrosLlamada->hora_contacto }}</td>
										    <td >{{ $registrosLlamada->numero_llamada }}</td>
										    <td >{{ $registrosLlamada->atendio_llamada }}</td>
										    <td >{{ $registrosLlamada->observaciones }}</td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    @can('registro-llamadas.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registros-llamadas.show',$registrosLlamada->id_registro_llamadas) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('registro-llamadas.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ url('registros-llamadas/'. $registrosLlamada->id_registro_llamadas . '/edit') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('registro-llamadas.destroy')
                                                    <form action="{{ url('registros-llamadas/'. $registrosLlamada->id_registro_llamadas) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    No se encontraron registros de llamadas para esta fecha.
                                                </td>
                                            </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
