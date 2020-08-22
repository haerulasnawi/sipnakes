@extends('layouts.sidebar')
@section('content')
<section class="section" id="dashboard">
<div class="section-header">
    <h1>Selamat Datang !</h1>
</div>
<div class="row">
    <div id="authheader" class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        {{-- <div class="login-brand">
        <a href="http://127.0.0.1:8000">
            <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </a>             
        </div> --}}

    <div class="card card-primary">
        <div class="card-header">
            <h4>Cek Identitas</h4>
        </div>
        <div class="card-body">
            <form id="search_form">
                <div class="form-group">                
                    <label class="form-label">Masukan Nomor Induk Kependudukan (NIK)</label>
                    <input id="number" name="number" type="text" class="form-control" required placeholder="" aria-label="">

                        <a id="cariidentitas" href="{{route('nakes.create')}}" data-id="{{Auth::user()->id}}" class="btn btn-primary modal-show" hidden type="button" title="Buat Akun Nakes">Cari</a>

                </div>
            </form>            
        </div>    
    </div>

    <div hidden id="dataidentitas">
        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="author-box-left">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                </div>
                <div class="author-box-details">
                <div class="author-box-description">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-5">
                                <p class="diskripsi">
                                Nama 
                                </p>
                            </div>
                            <div class="col-7">
                                <p class="diskripsi" id="nama">:  </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-5">
                                <p class="diskripsi">
                                    Profesi
                                </p>
                            </div>
                            <div class="col-7">
                                <p class="diskripsi">:  </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-5">
                                <p class="diskripsi">Status Registrasi</p>
                            </div>                        
                            <div class="col-6">
                                <p class="diskripsi">:  </p>
                                {{-- <span class="badge badge-success">Teregistrasi</span> --}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        
                        <div class="row">
                            <div class="col-5">
                                <p class="diskripsi">Izin Praktek</p>
                            </div>                        
                            <div class="col-6">
                                <p class="diskripsi">: </p>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
    </div> 
    </div>
</div>
</section>

@endsection
@push('script_top')
    <style>

    </style>
@endpush
@push('script_bottom')
<script>
</script>    
@endpush