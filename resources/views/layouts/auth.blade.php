@extends('layouts.layout')
@section('master')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div id="authheader" class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="{{ url('/') }}">
                <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle" >
              </a>             
            </div>

            @yield('login')
            
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection