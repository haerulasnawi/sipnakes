@extends('layouts.old_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi alamat email Anda !') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Cek kontak masuk email untuk mendapatkan link verifikasi.') }}
                    {{ __('Jika belum mendapatkan email verifikasi') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf                        
                        <button type="submit" class="btn btn-primary">{{ __('Kirim Verifikasi Ulang') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
