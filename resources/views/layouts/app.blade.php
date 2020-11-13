<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN | GUEST BOOK</title>

    @include('partials/css')

</head>

<body class="theme-blue theme-blue-light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Harap tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="{{ asset('img/logo-smk.png') }}" alt="" width="50px" class="pull-right">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/admin">GUEST BOOK DIGITAL</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <br><br>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">Selamat Datang, {{ Auth::user()->name }}!</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class=" material-icons">input</i>Keluar</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">DASHBOARD</li>
                    <li class="@yield('dashboard')">
                        <a href="/admin">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="header">MASTER DATA</li>
                    <li class="@yield('permintaan')">
                        <a href="/admin/permintaan">
                            <i class="material-icons">book</i>
                            <span>Permintaan</span>
                        </a>
                    </li>
                    <li class="@yield('pengaturan')">
                        <a href="/admin/pengaturan">
                            <i class="material-icons">settings</i>
                            <span>Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <!-- Nothing here.. -->
                </div>
                <div class="version">
                    Guest Book Digital <b>v 1.0</b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        @yield('content')
    </section>

    @yield('js')

    @include('partials/js')

</body>

</html>