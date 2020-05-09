@extends('layouts.navbar')
@section('sidebar')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{route('dashboard')}}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (auth()->user()->role=='superadmin')
            <li class="menu-header">Berkas</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-file-alt"></i><span>Berkas</span></a>
            </li>
            <li class="menu-header">User</li>
            <li>
                <a id="user_biasa" class="nav-link" href="{{route('users.index')}}"><i class="fas fa-user-check"></i><span>User</span></a>
            </li>
            <li class="menu-header">Nakes</li>
            <li>
                <a id="nakes" class="nav-link" href="{{route('nakes.index')}}"><i class="fas fa-user-md"></i><span>
                        Nakes</span></a>
            </li>
            <li class="menu-header">Faskes</li>
            <li>
                <a class="nav-link" href="{{route('faskes.index')}}"><i
                        class="fas fa-hospital-alt"></i><span>
                        Faskes</span></a>
            </li>
            <li class="menu-header">STR dan SIP</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-file-medical-alt"></i><span>STR dan
                        SIP</span></a>
                <ul class="dropdown-menu">
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-medical"></i><span>
                                STR</span></a></li>
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-contract"></i><span>
                                SIP</span></a></li>
                </ul>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li> <a class="nav-link" href="{{route('persyaratan.index')}}"><i
                                class="fas fa-file-medical"></i><span>
                                Persyaratan</span></a></li>
                    <li> <a class="nav-link" href=""><i
                                class="fas fa-file-contract"></i><span>
                                SIP</span></a></li>
                </ul>
            </li>
            @endif
            @if (auth()->user()->role=='admin')
            <li class="menu-header">Berkas</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-file-alt"></i><span>Berkas</span></a>
            </li>
            <li class="menu-header">User</li>
            <li>
                <a id="user_biasa" class="nav-link" href="{{route('users.index')}}"><i class="fas fa-user-check"></i><span>User</span></a>
            </li>
            <li class="menu-header">Nakes</li>
            <li>
                <a id="nakes" class="nav-link" href="{{route('nakes.index')}}"><i class="fas fa-user-md"></i><span>
                        Nakes</span></a>
            </li>
            <li class="menu-header">Faskes</li>
            <li>
                <a class="nav-link" href="{{route('faskes.index')}}"><i
                        class="fas fa-hospital-alt"></i><span>
                        Faskes</span></a>
            </li>
            <li class="menu-header">STR dan SIP</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-file-medical-alt"></i><span>STR dan
                        SIP</span></a>
                <ul class="dropdown-menu">
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-medical"></i><span>
                                STR</span></a></li>
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-contract"></i><span>
                                SIP</span></a></li>
                </ul>
            </li>
            <li class="menu-header">Verifikasi</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-file-signature"></i><span>Verifikasi SIP</span></a>
            </li>
            @endif
            @if (auth()->user()->role=='faskes')
            <li class="menu-header">Profile</li>
            <li>
                <a class="nav-link" href="{{route('profile.faskes')}}"><i
                        class="fas fa-user"></i><span>Profile</span></a>
            </li>
            <li class="menu-header">Berkas</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-file-alt"></i><span>Berkas</span></a>
            </li>
            <li class="menu-header">User</li>
            <li>
                <a id="user_biasa" class="nav-link" href="{{route('users.index')}}"><i class="fas fa-user-check"></i><span>User</span></a>
            </li>
            <li class="menu-header">Nakes</li>
            <li>
                <a id="nakes" class="nav-link" href="{{route('nakes.index')}}"><i class="fas fa-user-md"></i><span>
                        Nakes</span></a>
            </li>
            <li class="menu-header">STR dan SIP</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-file-medical-alt"></i><span>STR dan
                        SIP</span></a>
                <ul class="dropdown-menu">
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-medical"></i><span>
                                STR</span></a></li>
                    <li> <a class="nav-link" href="layout-default.html"><i
                                class="fas fa-file-contract"></i><span>
                                SIP</span></a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-flag"></i><span>Laporan Bulanan</span></a>
            </li>
            @endif
            @if (auth()->user()->role=='nakes')
            <li class="menu-header">Profile</li>
            <li>
                <a class="nav-link" href="{{route('profile.nakes')}}"><i
                        class="fas fa-user"></i><span>Profile</span></a>
            </li>
            <li class="menu-header">Berkas</li>
            <li>
                <a class="nav-link" href="layout-default.html"><i
                        class="fas fa-file-alt"></i><span>Berkas</span></a>
            </li>
            @endif                                 
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> SIPNAKES
            </a>
        </div>
    </aside>
</div>
<!-- Main Content -->
<div class="main-content">
@yield('content')
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Haerul Asnawi</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
@endsection
@push('script_bottom')

@endpush
