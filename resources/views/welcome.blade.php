@extends('layouts.app')
@section('content')
<!-- Baner Section -->
<section id="banner">
    <div class="container">
        <div class="row">                
            <div class="col-md-6">
                <p class="landing-title">Selamat Datang di</p>
                <p class="judul">SIPNAKES</p>
                <p>Aplikasi Pelayanan Surat Izin Praktik Tenaga Kesehatan</p>
                <p>Dinas Kesehatan Kabupaten Lombok Barat</p>
                <br>
                @if (Route::has('register'))                    
                    <p><a class="btn btn-light" href="{{ route('register') }}"> DAFTAR </a></p>                    
                @endif 
            </div>
            <div class="col-md-6">
                <img src="img/undraw_hiring_cyhs.svg" class="rounded mx-auto d-block" alt="...">
            </div>
        </div>
    </div>
    <img src="img/botom-banner.png" alt="bottom-banner" class="bottom-img">
</section>
@endsection