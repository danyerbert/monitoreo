
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('MercalMarker.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.com/libraries/Chart.js">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @can('personas.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('personas.index') }}">{{ __('Operadores') }}</a>
                            </li>
                        @endcan
                        @can('estados.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('estados.index') }}">{{ __('Estados') }}</a>
                            </li>
                        @endcan
                        @can('registro-llamadas.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registros-llamadas.index') }}">{{ __('Registro de Llamadas') }}</a>
                        </li>
                        @endcan
                        @can('admin.users.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">{{ __('Usuarios') }}</a>
                        </li>
                        @endcan
                        @can('admin.users.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.roles.index') }}">{{ __('Lista de Roles') }}</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-right">
                                    <form action="{{ route('home') }}" method="GET" class="d-flex align-items-center">
                                        <div class="form-group">
                                            <label for="fecha">Buscar por Fecha:</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-body bg-white">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Estado</th>
                                            <th>Atendio Llamada</th>
                                            <th>Hora de contacto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($noatendiollamadas as $noatendio)
                                            @if($noatendio->atendio_llamada == "NO")
                                            <tr>
                                                <td >{{ $noatendio->estado->estado }}</td>
                                                <td >{{ $noatendio->atendio_llamada }}</td>
                                                <td >{{ $noatendio->hora_contacto }}</td>
                                            </tr>
                                            @endif
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
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        const labelsFromLaravel = @json($chartLabels);
        const dataFromLaravel = @json($chartData);
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Si', 'No'],
            datasets: [{
                    label: 'Número de Llamadas',
                    data: dataFromLaravel,   // Asignando la variable de datos
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // Color para 'Atendida'
                        'rgba(255, 99, 132, 0.6)'  // Color para 'No Atendida'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
</body>
</html>
