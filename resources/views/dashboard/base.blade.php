<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIDAVID</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="apple-touch-icon" href="apple-icon.png"> --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('css')

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="navbar-brand">SIDAVID</p>
                <p class="navbar-brand hidden"><img src="{{ asset('images/logo.png') }}" alt=""></p>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="@stack('navDashboard')">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Master</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children @stack('navSebaran') dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Sebaran</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-square"></i><a href="{{ route('sebaran.create') }}">Tambah Data</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('sebaran.index') }}">Lihat Data</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Analisis</h3><!-- /.menu-title -->
                    <li class="@stack('navResult')">
                        <a href="{{ route('result') }}"> <i class="menu-icon fa fa-search"></i>Hitung Sebaran </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" style="margin-top: 20px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="margin-top: 10px">{{ Auth::user()->name }}</span>&nbsp; <i class="fa fa-sort-desc"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <form action="{{ route('logoutSystem') }}" method="get">
                                @csrf
                                <button type="submit" class="btn-logout"><i class="fa fa-power-off"></i> Logout</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        {{-- content --}}
        @yield('content')
        {{-- end content --}}

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>