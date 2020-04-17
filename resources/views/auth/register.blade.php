@extends('layouts.auth')
@section('login')
<div class="card card-primary">
    <div class="card-header"><h4>Register</h4></div>

    <div class="card-body">
      <form method="POST" action="{{ route('register') }}">
        @csrf        
        <div class="row">
          <div class="form-group col-6">
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" autofocus="">
            @error('first_name')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <div class="form-group col-6">
            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" autofocus="">
            @error('last_name')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-12">
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" autofocus="">
            @error('username')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label class="d-block">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" checked="" value="P">
              <label class="form-check-label" for="exampleRadios1">
                Perempuan
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" checked="" value="L">
              <label class="form-check-label" for="exampleRadios2">
                Laki-laki
              </label>
            </div>
          </div>
          <div class="form-group col-6">
            <label>Tanggal Lahir</label>
            <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir">
            @error('tgl_lahir')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i>+62</i>
              </div>
            </div>
            <input type="number" class="form-control" name="phone">
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="password" class="d-block">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-6">
            <label for="password2" class="d-block">Password Confirmation</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block">
            Register
          </button>
        </div>
      </form>
      <div class="mt-5 text-muted text-center">
        <a href="{{ route('password.request') }}">{{ __('Lupa Password ?') }}</a><br>
         Menu <a href="{{ route('login') }}">{{ __('Login') }}</a>
    </div>
    </div>
  </div>
@endsection
@push('script_bottom')
<script>$(document).ready(function() {
    $("#authheader").removeClass();
    $("#authheader").addClass("col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2");
});</script>
@endpush