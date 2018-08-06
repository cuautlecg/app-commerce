<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', config('app.name'))</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link rel="stylesheet" href="{{ asset('css/material-kit.css?v=2.0.4')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="@yield('body-class')">

    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{url('/')}}">
                    {{config('app.name')}} </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                            </a>

                            <a href="{{route('home')}}" class="dropdown-item">
                                Dashboard
                            </a>
                            
                            @if(auth()->user()->admin)
                                <a href="{{url('admin/products')}}" class="dropdown-item">Gestionar productos</a>
                                <a href="{{url('admin/categories')}}" class="dropdown-item">Gestionar categorías</a>
                            @endif                            

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        @yield('content')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--	Plugin for Sharrre btn -->
    <script src="{{ asset('js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-kit.js?v=2.0.4') }}" type="text/javascript"></script>
    <!-- Busqueda predictiva -->
    @yield('scripts')
</body>

</html>