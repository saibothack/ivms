{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('js/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/jquery.bootgrid-1.3.1/jquery.bootgrid.min.css') }}">
        
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        
        <link rel="icon" type="image/png" href="{{ asset('images/ic_logo_16.png') }}">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>
        <script src="https://use.fontawesome.com/9712be8772.js"></script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/ic_logo_40.png') }}" alt="Logo"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @if (!Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permissions.index') }}">Permisos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Lineas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Vehiculos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Remisiones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Rastreo</a>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <label class="nav-link">Bienvenido</label>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Salir</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
            
            <div class="container" style="margin-top: 2rem !important;">
                @if(Session::has('flash_message'))
                <div class="container">      
                    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                    </div>
                </div>
                @endif 

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">              
                        @include ('errors.list') {{-- Including error file --}}
                    </div>
                </div>

                <!-- Content here -->
                @yield('content')
            </div>

        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.bootgrid-1.3.1/jquery.bootgrid.fa.min.js') }}"></script>
        <script src="{{ asset('js/jquery.bootgrid-1.3.1/jquery.bootgrid.min.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>