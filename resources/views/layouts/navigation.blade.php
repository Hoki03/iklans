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
    <a href="{{ route('beranda') }}" class="brand-link">
        <img src="{{ asset('Image/logo-kominfo-transparent.png') }}" class="brand-image img-circle elevation- w-8 btn-menu" alt="User Image">
        <!-- <i class="ri-folder-open-fill"></i> -->
        <span class="brand-text font-weight-light text-white text-xl">Iklan</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="my-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin: 1.5rem 0;">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                @if (Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link btn-menu text-neutral-100">
                        <i class="nav-icon fa-solid fa-user-shield"></i>
                        <p>
                            Admin Kominfo
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->level == 'operator')
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link btn-menu text-neutral-100">
                        <i class="nav-icon fa-solid fa-user "></i>
                        <p>
                            Operator Kominfo
                        </p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>

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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link btn-menu text-neutral-100 {{ Route::currentRouteNamed('beranda') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.create') }}" class="nav-link btn-menu text-neutral-100 {{ Route::currentRouteNamed('transaksi.create') ? 'active' : '' }}">
                        <!-- <i class="far fa-circle nav-icon"></i> -->
                        <i class="fa-solid fa-money-bill-transfer nav-icon"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                @if (Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link text-neutral-100 {{ Route::currentRouteNamed('user.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-group nav-icon text-sm"></i>
                        <p>Data user</p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link btn-menu text-neutral-100 {{ Route::currentRouteNamed('transaksi.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-database nav-icon"></i>
                        <p>Data Transaksi</p>
                    </a>
                </li>

                <li class="nav-item" style="margin-top:15px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="btn-logout nav-link bg-red-700 text-white hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition" style="border: 1px solid tomato; color: tomato" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
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