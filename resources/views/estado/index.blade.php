@extends('layouts.app')

@section('template_title')
    Estados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >No</th>
									<th >Estado</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estados as $estado)
                                        <tr>
										<td >{{ $estado->id_estado }}</td>
										<td >{{ $estado->estado }}</td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estados.show', $estado->id_estado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ url('estados/'. $estado->id_estado . '/edit') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <form action="{{ url('estados/'. $estado->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Estas seguro que desea eliminar estado?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash-can"></i> {{ __('Eliminar') }}</button>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $estados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
