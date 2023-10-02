<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="beranda" class="nav-link">Beranda</a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="beranda" class="brand-link">
        <center>
            <h3 class="brand-text font-weight-light">Iklan</h3>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Image/logo-kominfo-transparent.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">

                @if (Auth::user()->level == 'admin')
                    <a href="{{ route('profile.edit') }}" class="d-block">Admin Kominfo</a>
                @endif

                @if (Auth::user()->level == 'operator')
                    <a href="{{ route('profile.edit') }}" class="d-block">Operator Kominfo</a>
                @endif

            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('beranda') }}"
                        class="nav-link {{ Route::currentRouteNamed('beranda') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.create') }}"
                        class="nav-link btn-menu {{ Route::currentRouteNamed('transaksi.create') ? 'active' : '' }}">
                        <!-- <i class="far fa-circle nav-icon"></i> -->
                        <i class="ri-folder-add-fill"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                @if (Auth::user()->level == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link btn-menu {{ Route::currentRouteNamed('user.index') ? 'active' : '' }}">
                            <i class="ri-folder-user-fill"></i>
                            <p>Data user</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}"
                        class="nav-link btn-menu {{ Route::currentRouteNamed('transaksi.index') ? 'active' : '' }}">
                        <i class="ri-folder-open-fill"></i>
                        <p>Data Transaksi</p>
                    </a>
                </li>

                <li class="nav-item" style="margin-top:15px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="btn-logout nav-link"
                            style="border: 1px solid tomato; color: tomato"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="ri-arrow-left-circle-fill"></i>
                            <p>
                                {{ __('Log Out') }}
                            </p>
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
