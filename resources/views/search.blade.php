@extends('layouts.auth')
@section('login')
<div class="card card-primary">
    <div class="card-header"><h4>Cek Status Nakes</h4></div>
    <div class="card-body">
        <div class="form-group">
          <label class="form-label">Pilih Jenis Dokumen</label>
          <div class="custom-switches-stacked mt-2">
            <label class="custom-switch">
              <input type="radio" name="option" value="nik" class="custom-switch-input" checked="">
              <span class="custom-switch-indicator"></span>
              <span class="custom-switch-description">NIK</span>
            </label>
            <label class="custom-switch">
              <input type="radio" name="option" value="str" class="custom-switch-input">
              <span class="custom-switch-indicator"></span>
              <span class="custom-switch-description">STR</span>
            </label>
            <label class="custom-switch">
              <input type="radio" name="option" value="sip" class="custom-switch-input">
              <span class="custom-switch-indicator"></span>
              <span class="custom-switch-description">SIP</span>
            </label>
          </div>
          <label class="form-label">Masukan Nomor Dokumen</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">Cari</button>
            </div>
          </div>
        </div>
    </div>    
  </div>

  <!-- Data NIK -->
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
                        <p class="diskripsi">: madina azkarani </p>
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
                        <p class="diskripsi">: 2020-03-02 </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <p class="diskripsi">Surat Tanda Registrasi</p>
                    </div>                        
                    <div class="col-6">
                        <p class="diskripsi">: <span class="badge badge-success">Teregistrasi</span> </p>
                    </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Data STR -->
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
                        <p class="diskripsi">: madina azkarani </p>
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
                        <p class="diskripsi">: 2020-03-02 </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <p class="diskripsi">Surat Tanda Registrasi</p>
                    </div>                        
                    <div class="col-6">
                        <p class="diskripsi">: <span class="badge badge-success">Teregistrasi</span> </p>
                    </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Data SIP -->
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
                        <p class="diskripsi">: madina azkarani </p>
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
                        <p class="diskripsi">: 2020-03-02 </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <p class="diskripsi">Fasilitas Kesehatan</p>
                    </div>                        
                    <div class="col-6">
                        <p class="diskripsi">: UPT BLUD Puskesmas Penimbung</p>
                    </div>
                </div>
            </li>
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