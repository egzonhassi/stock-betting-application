<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="{{asset('js/highchart.js')}}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simplebet !') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <body id="page-top">
            <div id="wrapper">
                @if(Auth::check())
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard')}}">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Simplebet!</div>
                    </a>

                    <hr class="sidebar-divider my-0">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Main Dashboard</span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        User
                    </div>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Betting</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Betting Components:</h6>
                                <a class="collapse-item" href="{{ route('bettingHistory')}}">Betting History</a>
                                @if(Auth::user()->isAdmin == 1)
                                    <a class="collapse-item" href="{{ route('fixPrices')}}">Fix Prices</a>
                                @endif
                            </div>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stockPriceChart')}}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Stock Price Chart</span></a>
                    </li>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                @endif
                <div id="content-wrapper" class="d-flex flex-column">

                    <div id="content">
                        @if(Auth::check())
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item dropdown no-arrow mx-1">
                                    <span class="nav-link">
                                        <span class="">{{Auth::user()->tokens }}</span><i class="fab fa-bitcoin fa-fw"></i>

                                    </span>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name }}</span>
                                        <img class="img-profile rounded-circle"
                                            src="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{route('profile')}}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>

                            </ul>

                        </nav>
                        @endif
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Simplebet!</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">We will miss you, make sure you come back again.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            {!!Form::open(array('route' => 'logout', 'method' => 'post')) !!}
                            <button type="submit" class="btn btn-primary">Logout</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <script src={{ asset('vendor/jquery/jquery.js') }}></script>
            <script src={{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}></script>

            <script src={{ asset('vendor/jquery-easing/jquery.easing.js') }}></script>

            <script src={{ asset('js/sb-admin-2.js') }}></script>

        </body>

</html>
