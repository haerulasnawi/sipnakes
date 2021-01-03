<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    {{-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> --}}
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
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
<!-- <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
<script src="{{asset('assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/tooltip.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/modules/moment.min.js')}}"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="{{asset('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('node_modules/prismjs/prism.js')}}"></script>
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>    
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('sweetalert::alert')
<!-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) -->


<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>


<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@stack('script_bottom')
</html>