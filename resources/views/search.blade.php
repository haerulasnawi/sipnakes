@extends('layouts.auth')
@section('login')
<div class="card card-primary">
    <div class="card-header"><h4>Cek Nomor Registrasi Nakes</h4></div>
    <div class="card-body">
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">Cari</button>
            </div>
          </div>
        </div>
    </div>    
  </div>
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
                          <i class="far fa-id-card"></i>
                            Nama Lengkap
                        </p>
                    </div>
                    <div class="col-7">
                        <p class="diskripsi">: madina azkarani </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <p class="diskripsi">
                          <i class="fas fa-calendar-alt"></i>
                           Tempat, tanggal lahir
                        </p>
                    </div>
                    <div class="col-7">
                        <p class="diskripsi">: 2020-03-02 </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <p class="diskripsi"><i class="fas fa-venus-mars"></i> Jenis Kelamin</p>
                    </div>                        
                    <div class="col-6">
                        <p class="diskripsi">: P </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item"><div class="row">
                <div class="col-5">
                    <p class="diskripsi"><i class="fas fa-map-marked-alt"></i> Alamat</p>
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <p class="diskripsi"> </p>
                </div>
            </div></li>
            <li class="list-group-item"><div class="row">
                <div class="col-5">
                    <p class="diskripsi"><i class="fas fa-mobile-alt"></i> Nomor kontak</p>
                </div>
                <div class="col-7">
                    <p class="diskripsi">: 24234 </p>
                </div>
            </div></li>
          </ul>
        </div>
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