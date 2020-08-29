<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="'{{asset('/assets/modules/fontawesome/css/all.min.css')}}'">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/summernote/summernote-bs4.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/style.css')}}"> --}}
    @stack('stylesheet')
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    @stack('script_top')
    <!-- /END GA -->
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @yield('master')
        </div>
    </div>
    @include('layouts._modal')


    
</body>
<!-- General JS Scripts -->
<script src="{{asset('/assets/modules/jquery.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
<script src="{{asset('/assets/modules/popper.js')}}"></script>
<script src="{{asset('/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('/assets/modules/datatables/datatables.min.js')}}"></script>    
<script src="{{asset('/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('sweetalert::alert')


<!-- Page Specific JS File -->
<script src="{{asset('/assets/js/page/modules-datatables.js')}}"></script>
<script src="{{asset('/assets/js/page/bootstrap-modal.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('/assets/js/scripts.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
@stack('script_bottom')
</html>